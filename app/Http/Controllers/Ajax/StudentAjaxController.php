<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Force;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentAjaxController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::where('id', $id)->firstOrFail();
        $user = User::where('id', $student->user_id)->firstOrFail();
        $class = Classes::where('id', $student->class_id)->firstOrFail();
        $force = Force::where('id', $student->force_id)->firstOrFail();

        $data = [
            'user' => $user,
            'student' => $student,
            'class' => $class,
            'force' => $force
        ];

        return response()->json(['result' => $data]);
    }
}
