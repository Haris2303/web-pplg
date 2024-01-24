<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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

class StudentController extends Controller
{
    public function index(): View
    {
        $students = Student::latest()->paginate(10);

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
                'force_id' => ['required']
            ]);

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

        return redirect('/students');
    }

    public function destroy($id): RedirectResponse
    {
        $user = User::find($id);

        // delete student
        Student::where('user_id', $id)->delete();

        // delete user
        $user->delete();

        return redirect('/students')->with('success', 'Data siswa berhasil dihapus!');
    }
}
