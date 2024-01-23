<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ForceController extends Controller
{
    public function index(): View
    {
        return view('admin.forces.index');
    }

    public function create(): View
    {
        return view('admin.forces.create');
    }

    public function store(): RedirectResponse
    {
        return redirect('/forces');
    }

    public function edit(): View
    {
        return view('admin.forces.edit');
    }

    public function update(): RedirectResponse
    {
        return redirect('/forces');
    }
}
