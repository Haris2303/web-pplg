<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherAjaxController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::where('id', $id)->firstOrFail();
        $subjects = $teacher->hasSubjects;
        $user = User::where('id', $teacher->user_id)->firstOrFail();

        $data = [
            'user' => $user,
            'teacher' => $teacher,
            'subjects' => $subjects
        ];

        return response()->json(['result' => $data]);
    }
}
