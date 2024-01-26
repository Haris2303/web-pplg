<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Builder\Class_;

class TeacherController extends Controller
{
    public function index(): View
    {
        $data = [
            'teachers' => Teacher::latest()->paginate(10)
        ];

        return view('admin.teachers.index', $data);
    }

    public function create(): View
    {
        $data = [
            'subjects' => Subject::latest()->get(),
            'classes' => Classes::latest()->get()
        ];

        return view('admin.teachers.create', $data);
    }

    public function store(Request $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $credentialUser = $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'string', 'lowercase', 'email', 'unique:' . User::class],
            ]);

            $credentialTeacher = $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'string', 'lowercase', 'email', 'unique:' . User::class],
                'nip' => ['required', 'numeric', 'unique:' . Teacher::class],
                'education' => ['required'],
                'gender' => ['required'],
                'birth' => ['required'],
                'address' => ['required'],
                'religion' => ['required']
            ]);

            // make password
            $credentialUser['password'] = Hash::make('pass' . $request->nip);

            // make role is teacher
            $credentialUser['role'] = 'teacher';

            // save user
            $user = new User($credentialUser);
            $user->save();

            event(new Registered($user));

            $credentialTeacher['user_id'] = $user->id;

            // save teacher
            $teacher = new Teacher($credentialTeacher);
            $teacher->save();
        });

        return redirect('/teachers')->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function edit($id): View
    {
        $data = [
            'teacher' => Teacher::where('id', $id)->firstOrFail()
        ];

        return view('admin.teachers.edit', $data);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $rules = [
            'nip' => ['required', 'numeric'],
            'education' => ['required'],
            'gender' => ['required'],
            'birth' => ['required'],
            'address' => ['required'],
            'religion' => ['required']
        ];

        $teacher = Teacher::where('id', $id)->firstOrFail();

        if ($request->nip !== $teacher->nip) {
            $rules['nip'] = ['required', 'numeric', 'unique:' . Teacher::class];
        }

        // update user name
        User::where('id', $teacher->user_id)->update($request->validate([
            'name' => ['required', 'string']
        ]));

        // update teacher
        $credential = $request->validate($rules);
        $teacher->update($credential);

        return redirect()->route('teachers')->with('success', 'Data guru berhasil diubah!');
    }
}
