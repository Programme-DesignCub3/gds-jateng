<?php

use App\Http\Controllers\CompetitionController;
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



// Route::get('/submission', function () {
//     return Inertia::render('Upload');
// })->name('submission.create.basic');

// Route::put('/upload-filepond', [UploadController::class, 'uploadFilepond'])->name('test-upload.uploadFilepond');
// Route::post('/upload-advanced', [UploadController::class, 'upload'])->name('test-upload.advance');



Route::get('/kompetisi', [CompetitionController::class, 'index'])
    ->name('competition.index');

Route::get('/kompetisi/{title}', [CompetitionController::class, 'show'])
    ->name('competition.show');

Route::get('/pengumuman', function () {
    return redirect()->route('home');

    // return Inertia::render('Announcement');
})->name('announcement');

// Route::get('/dashboard', function () {
//     return redirect()->route('home');

//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/submission', function () {
        if (auth()->user()->submission) {
            # code...
            return Inertia::render('SubmissionDone');
        }

        return Inertia::render('Upload');
    })->name('submission.create');

    Route::post('/submission', [UploadController::class, 'uploadInertia'])->name('submission.store');

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';
