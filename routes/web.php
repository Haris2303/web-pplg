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

// Admin
Route::middleware(['auth', 'verified', \App\Http\Middleware\RoleAdminMiddleWare::class])->group(function () {
    // Students
    Route::get('/students', [\App\Http\Controllers\Dashboard\StudentController::class, 'index'])->name('students');
    Route::get('/student/create', [\App\Http\Controllers\Dashboard\StudentController::class, 'create'])->name('student.create');
    Route::post('/student', [\App\Http\Controllers\Dashboard\StudentController::class, 'store'])->name('student.store');
    Route::get('/student/edit/{id}', [\App\Http\Controllers\Dashboard\StudentController::class, 'edit'])->name('student.edit');
    Route::put('/student/{id}', [\App\Http\Controllers\Dashboard\StudentController::class, 'update'])->name('student.update');
    Route::delete('/student/{id}', [\App\Http\Controllers\Dashboard\StudentController::class, 'destroy'])->name('student.destroy');
    // Student ajax
    Route::resource('studentAjax', \App\Http\Controllers\Ajax\StudentAjaxController::class);

    // teachers
    Route::get('/teachers', [\App\Http\Controllers\Dashboard\TeacherController::class, 'index'])->name('teachers');
    Route::get('/teacher/create', [\App\Http\Controllers\Dashboard\TeacherController::class, 'create'])->name('teacher.create');
    Route::post('/teacher', [\App\Http\Controllers\Dashboard\TeacherController::class, 'store'])->name('teacher.store');
    Route::get('/teacher/edit/{id}', [\App\Http\Controllers\Dashboard\TeacherController::class, 'edit'])->name('teacher.edit');
    Route::put('/teacher/{id}', [\App\Http\Controllers\Dashboard\TeacherController::class, 'update'])->name('teacher.update');
    Route::delete('/teacher/{id}', [\App\Http\Controllers\Dashboard\TeacherController::class, 'destroy'])->name('teacher.destroy');

    // Classes
    Route::get('/classes', [\App\Http\Controllers\Dashboard\ClassController::class, 'index'])->name('classes');
    Route::get('/class/create', [\App\Http\Controllers\Dashboard\ClassController::class, 'create'])->name('class.create');
    Route::post('/class', [\App\Http\Controllers\Dashboard\ClassController::class, 'store'])->name('class.store');
    Route::get('/class/edit/{id}', [\App\Http\Controllers\Dashboard\ClassController::class, 'edit'])->name('class.edit');
    Route::put('/class', [\App\Http\Controllers\Dashboard\ClassController::class, 'update'])->name('class.update');
    Route::delete('/class', [\App\Http\Controllers\Dashboard\ClassController::class, 'destroy'])->name('class.destroy');

    // Subjects
    Route::get('/subjects', [\App\Http\Controllers\Dashboard\SubjectController::class, 'index'])->name('subjects');
    Route::get('/subject/create', [\App\Http\Controllers\Dashboard\SubjectController::class, 'create'])->name('subject.create');
    Route::get('/subject/edit/{id}', [\App\Http\Controllers\Dashboard\SubjectController::class, 'edit'])->name('subject.edit');
    Route::post('/subject', [\App\Http\Controllers\Dashboard\SubjectController::class, 'store'])->name('subject.store');
    Route::put('/subject', [\App\Http\Controllers\Dashboard\SubjectController::class, 'update'])->name('subject.update');
    Route::delete('/subject', [\App\Http\Controllers\Dashboard\SubjectController::class, 'destroy'])->name('subject.destroy');
    // Ajax Subject
    Route::resource('/subjectAjax', \App\Http\Controllers\Ajax\SubjectAjaxController::class);

    // Forces
    Route::get('/forces', [\App\Http\Controllers\Dashboard\ForceController::class, 'index'])->name('forces');
    Route::get('/force/create', [\App\Http\Controllers\Dashboard\ForceController::class, 'create'])->name('force.create');
    Route::get('/force/edit/{id}', [\App\Http\Controllers\Dashboard\ForceController::class, 'edit'])->name('force.edit');
    Route::post('/force', [\App\Http\Controllers\Dashboard\ForceController::class, 'store'])->name('force.store');
    Route::put('/force', [\App\Http\Controllers\Dashboard\ForceController::class, 'update'])->name('force.update');
    Route::delete('/force', [\App\Http\Controllers\Dashboard\ForceController::class, 'destroy'])->name('force.destroy');
});

// Teacher
Route::middleware(['auth', 'verified', \App\Http\Middleware\RoleTeacherMiddleware::class])->group(function () {
    // attendances
    Route::resource('attendance', \App\Http\Controllers\Teacher\AttendanceResourceController::class);
});

// Student
Route::middleware(['auth', 'verified', \App\Http\Middleware\RoleStudentMiddleware::class])->group(function () {
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
