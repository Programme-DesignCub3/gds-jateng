<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('/test-upload', function () {
    return Inertia::render('Upload');
})->name('test-upload.create');

Route::post('/test-upload', function (Request $request) {
    dd($request->file('files'));
    if ($request->hasfile('files')) {
        foreach ($request->file('files') as $file) {
            if ($file->isValid()) {
                $file->store('testUpload');
            }
        }
    } else {
        echo 'Gagal';
    }

    // return Inertia::render('Test',);
})->name('test-upload.store');

Route::get('/kompetisi', function () {
    return Inertia::render('Competition/Index');
})->name('competition.index');

Route::get('/kompetisi/detail', function () {
    return Inertia::render('Competition/Show');
})->name('competition.show');

Route::get('/pengumuman', function () {
    return Inertia::render('Announcement');
})->name('announcement');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
