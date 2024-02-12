<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(): View
    {
        $subjects = Subject::latest()->filter(request('q'))->paginate(10);

        $data = [
            'subjects' => $subjects
        ];

        return view('admin.subjects.index', $data);
    }

    public function create(): View
    {
        return view('admin.subjects.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $credential = $request->validate([
            'name' => ['required', 'unique:' . Subject::class]
        ]);

        $subject = new Subject($credential);
        $subject->save();

        return redirect('/subjects')->with('success', 'Data Mata Pelajaran berhasil ditambahkan!');
    }

    public function edit($id): View
    {
        $subject = Subject::where('id', $id)->firstOrFail();

        $data = [
            'subject' => $subject
        ];

        return view('admin.subjects.edit', $data);
    }

    public function update(Request $request): RedirectResponse
    {
        $subject = Subject::find($request->id);

        if ($request->name != $subject->name) {

            $request->validate([
                'name' => ['required', 'unique:' . Subject::class]
            ]);

            $subject->name = $request->name;
            $subject->save();
        }

        return redirect('/subjects')->with('success', 'Data Mata Pelajaran berhasil diubah!');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Subject::find($request->id)->delete();

        return redirect()->route('subjects')->with('success', 'Data Mata Pelajaran berhasil dihapus!');
    }
}
