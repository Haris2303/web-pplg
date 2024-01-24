<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Force;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ForceController extends Controller
{
    public function index(): View
    {
        $data = [
            'forces' => Force::latest()->paginate(10)
        ];

        return view('admin.forces.index', $data);
    }

    public function create(): View
    {
        return view('admin.forces.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $credential = $request->validate([
            'year' => ['required']
        ]);

        $force = new Force($credential);
        $force->save();

        return redirect('/forces')->with('success', 'Data angkatan berhasil ditambahkan!');
    }

    public function edit($id): View
    {
        $force = Force::where('id', $id)->firstOrFail();

        $data = [
            'force' => $force
        ];

        return view('admin.forces.edit', $data);
    }

    public function update($request): RedirectResponse
    {
        $force = Force::find($request->id);

        if ($request->year != $force->year) {

            $request->validate([
                'year' => ['required', 'unique:' . Force::class]
            ]);

            $force->year = $request->year;
            $force->save();
        }

        return redirect()->route('forces')->with('success', 'Data angkatan berhasil diubah!');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Force::find($request->id)->delete();

        return redirect()->route('forces')->with('success', 'Data angkatan berhasil dihapus!');
    }
}
