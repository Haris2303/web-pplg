<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
}
