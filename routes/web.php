<?php

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProfileController;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;

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

Route::get('/test-upload/basic', function () {
    return Inertia::render('Upload');
})->name('test-upload.create.basic');

Route::get('/test-upload', function () {
    return Inertia::render('Upload');
})->name('test-upload.create');

Route::post('/test-upload/basic', function (Request $request) {
    if ($request->hasfile('files')) {

        foreach ($request->file('files') as $file) {
            if ($file->isValid()) {
                dd($file);
                $file->store('testUpload');
            }
        }
    } else {
        echo 'Gagal';
    }

    // return Inertia::render('Test',);
})->name('test-upload.basic');

Route::post('/upload-advanced', [UploadController::class, 'upload'])->name('test-upload.advance');

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
