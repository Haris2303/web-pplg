<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Classes;
use App\Models\Force;
use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = Student::latest()->filter(request(['q']))->paginate(10);

        $data = [
            'students' => $students
        ];

        return view('admin.students.index', $data);
    }

    public function create(): View
    {
        $data = [
            'classes' => Classes::latest()->get(),
            'forces' => Force::latest()->get()
        ];

        return view('admin.students.create', $data);
    }

    public function store(Request $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $credentialUser = $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'string', 'lowercase', 'email', 'unique:' . User::class],
            ]);

            $credentialStudent = $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'string', 'lowercase', 'email', 'unique:' . User::class],
                'nis' => ['required', 'numeric', 'unique:' . Student::class],
                'nisn' => ['required', 'numeric', 'unique:' . Student::class],
                'gender' => ['required'],
                'birth' => ['required'],
                'address' => ['required'],
                'religion' => ['required'],
                'mother' => ['required'],
                'father' => ['required'],
                'class_id' => ['required'],
                'force_id' => ['required'],
                'picture' => ['image', 'file', 'max:1024']
            ]);

            if($request->file('picture')) {
                $credentialStudent['picture'] = $request->file('picture')->store('img/students/profile');
            }

            // make password
            $credentialUser['password'] = Hash::make('pass' . $request->nisn);

            // make role is student
            $credentialUser['role'] = 'student';

            // save user
            $user = new User($credentialUser);
            $user->save();

            event(new Registered($user));

            $credentialStudent['user_id'] = $user->id;

            // save student
            $student = new Student($credentialStudent);
            $student->save();
        });

        return redirect('/students')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function edit($id): View
    {
        $data = [
            'student' => Student::where('id', $id)->firstOrFail(),
            'classes' => Classes::latest()->get(),
            'forces' => Force::latest()->get()
        ];

        return view('admin.students.edit', $data);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $rules = [
            'name' => ['required', 'string'],
            'nis' => ['required', 'numeric'],
            'nisn' => ['required', 'numeric'],
            'gender' => ['required'],
            'birth' => ['required'],
            'address' => ['required'],
            'religion' => ['required'],
            'mother' => ['required'],
            'father' => ['required'],
            'class_id' => ['required'],
            'force_id' => ['required'],
            'picture' => ['file', 'image', 'max:1024']
        ];

        $student = Student::where('id', $id)->firstOrFail();

        if ($request->nis !== $student->nis || $request->nisn !== $student->nisn) {
            $rules['nis'] = ['required', 'numeric', 'unique:' . Student::class];
            $rules['nisn'] = ['required', 'numeric', 'unique:' . Student::class];
        }

        // update user name
        User::where('id', $student->user_id)->update($request->validate([
            'name' => ['required', 'string']
        ]));

        // validasi student request
        $credential = $request->validate($rules);

        // check picture
        if($request->file('picture')) {
            // if picture is changed
            if($request->oldPicture) {
                Storage::delete($request->oldPicture);
            }
            $credential['picture'] = $request->file('picture')->store('img/students/profile');
        }

        // update user
        $student->update($credential);

        return redirect()->route('students')->with('success', 'Data siswa berhasil diubah!');
    }

    public function destroy($id): RedirectResponse
    {
        $user = User::find($id);

        $student = Student::where('user_id', $user->id)->firstOrFail();

        Attendance::where('student_id', $student->id)->delete();

        // delete student
        $student->delete();

        // delete user
        $user->delete();

        return redirect('/students')->with('success', 'Data siswa berhasil dihapus!');
    }
}
