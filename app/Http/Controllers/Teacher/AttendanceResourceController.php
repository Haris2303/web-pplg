<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $teacher_id = Auth::user()->teacher->id;
        $attendances = Attendance::where('teacher_id', $teacher_id)->latest()->get();
        
        // Get datetime covert to array saving into $arrayDate
        $arrayDate = [];
        for ($i=0; $i < count($attendances); $i++) { 
            $arrayDate[] = $attendances[$i]->datetime;
        }

        $data = [
            'attendances' => Attendance::where('teacher_id', $teacher_id)->latest()->filter(request(['q']))->get(),
            'classes' => Classes::latest()->get(),
            'subjects' => Teacher::where('id', Auth::user()->teacher->id)->first()->hasSubjects,
            'arrayDate' => array_unique($arrayDate)
        ];

        return view('teacher.attendances.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $data = [
            'students' => Student::where('class_id', $request->class_id)->get(),
            'class' => Classes::where('id', $request->class_id)->firstOrFail(),
            'subject' => Subject::where('id', $request->subject_id)->firstOrFail()
        ];

        return view('teacher.attendances.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        for ($i = 0; $i < count($request->student_id); $i++) {
            $student = $request->student_id[$i];
            Attendance::create([
                'datetime' => $request->datetime,
                'status' => $request->status[$student],
                'student_id' => $student,
                'teacher_id' => Auth::user()->teacher->id,
                'subject_id' => $request->subject_id,
                'class_id' => $request->class_id
            ]);
        }

        return redirect('/attendance')->with('success', 'Data absensi berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
