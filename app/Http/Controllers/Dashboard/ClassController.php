<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use PhpParser\Builder\Class_;

class ClassController extends Controller
{
    public function index(): View
    {
        $data = [
            'classes' => Classes::latest()->paginate(10),
        ];

        return view('admin.classes.index', $data);
    }

    public function create(): View
    {
        return view('admin.classes.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $credential = $request->validate([
            'name' => ['required']
        ]);

        $class = new Classes($credential);
        $class->save();

        return redirect('/classes')->with('success', 'Data kelas berhasil ditambahkan!');
    }

    public function edit($id): View
    {
        $data = [
            'class' => Classes::where('id', $id)->firstOrFail()
        ];

        return view('admin.classes.edit', $data);
    }

    public function update(Request $request): RedirectResponse
    {
        $class = Classes::where('id', $request->id)->firstOrFail();

        if ($request->name != $class->name) {
            $request->validate([
                'name' => ['required', 'unique:' . Classes::class]
            ]);

            $class = Classes::find($request->id);
            $class->name = $request->name;
            $class->save();
        }

        return redirect('/classes')->with('success', 'Data kelas berhasil diubah!');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Classes::where('id', $request->id)->delete();

        return redirect('/classes')->with('success', 'Data kelas berhasil dihapus!');
    }
}
