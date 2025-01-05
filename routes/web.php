<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradesheetController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\CurriculumController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.sign-in');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*****************************
== START ====================
*****************************/


Route::prefix('student')->group(function () {

    Route::get('/', [StudentController::class, 'index'])->name('students');
    Route::get('/add', [StudentController::class, 'add'])->name('students.add');
    Route::post('/store', [StudentController::class, 'store'])->name('students.store');
    Route::delete('/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
    // For importing...
    Route::post('/import', [StudentController::class, 'importFromXLSX'])->name('students.import');
});

Route::prefix('gradesheet')->group(function () {

    Route::get('/', [GradesheetController::class, 'index'])->name('gradesheets');
    Route::get('/add', [GradesheetController::class, 'add'])->name('gradesheets.add');
    Route::post('/store', [GradesheetController::class, 'store'])->name('gradesheets.store');
    Route::get('/view/{id}', [GradesheetController::class, 'show'])->name('gradesheets.show');
    Route::get('/pdf/{id}', [GradesheetController::class, 'generatepdf'])->name('gradesheet.generate');
    Route::delete('/{id}', [GradesheetController::class, 'destroy'])->name('gradesheet.destroy');
    Route::get('/{id}/edit', [GradesheetController::class, 'edit'])->name('gradesheet.edit');
    Route::put('/', [GradesheetController::class, 'update'])->name('gradesheet.update');

});

// Configuration group

Route::prefix('courses')->group(function () {
    Route::get('/', [CoursesController::class, 'index'])->name('courses');
    Route::get('/add', [CoursesController::class, 'add'])->name('courses.add');
    Route::post('/store', [CoursesController::class, 'store'])->name('course.store');
});

Route::prefix('subjects')->group(function () {
    Route::get('/', [SubjectsController::class, 'index'])->name('subjects');
    Route::get('/add', [SubjectsController::class, 'add'])->name('subjects.add');
    Route::post('/store', [SubjectsController::class, 'store'])->name('subject.store');
});

Route::prefix('curriculum')->group(function () {
    Route::get('/', [CurriculumController::class, 'index'])->name('curriculums');
    Route::get('/add', [CurriculumController::class, 'add'])->name('curriculums.add');
    // For importing...
    Route::post('/import', [CurriculumController::class, 'import'])->name('curriculum.import');
});
/*****************************
== END ====================
*****************************/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
