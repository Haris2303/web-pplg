<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = Student::latest()->get();

        $data = [
            'students' => $students
        ];

        return view('admin.students.index', $data);
    }

    public function create(): View
    {
        return view('admin.students.create');
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
                'nis' => ['required'],
                'nisn' => ['required'],
                'gender' => ['required'],
                'birth' => ['required'],
                'address' => ['required'],
                'religion' => ['required'],
                'mother' => ['required'],
                'father' => ['required']
            ]);

            // make password
            $credentialUser['password'] = Hash::make('pass' . $request->nis);

            // save user
            $user = new User($credentialUser);
            $user->save();

            // save student
            $student = new Student($credentialStudent);
            $student->save();
        });

        return redirect('/students');
    }
}
