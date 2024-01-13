<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Guest
Route::get('/', function () {
    return view('web.home');
});

Route::get('/news', function () {
    return view('web.news');
});

Route::get('/gallery', function () {
    return view('web.gallery');
});

Route::get('/contact', function () {
    return view('web.contact');
});

Route::get('/about-app', function () {
    return view('web.about.dev');
});

Route::get('/background', function () {
    return view('web.about.background');
});

Route::get('/vision-mision', function () {
    return view('web.about.vision-mision');
});

Route::get('/leadership', function () {
    return view('web.about.leadership');
});

Route::get('/teachers', function () {
    return view('web.about.teachers');
});

Route::get('/subjects', function () {
    return view('web.about.subjects');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
