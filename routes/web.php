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
})
    ->name('home');

Route::get('/kompetisi', [CompetitionController::class, 'index'])
    ->name('competition.index');

Route::get('/kompetisi/{title}', [CompetitionController::class, 'show'])
    ->name('competition.show');

Route::get('/pengumuman', function () {
    // return redirect()->route('home');

    $finalistSemarang = [
        [
            'competition' => 'mascot',
            'label' => 'DESAIN MASKOT',
            'list' =>
            [
                [
                    'school_name' => 'SMA SINT LOUIS',
                    'name' => 'Petra Kania',
                    'thumbnail' => asset('assets/finalist/semarang/mascot/1.jpg'),
                ],
                [
                    'school_name' => 'SMAN 4 SEMARANG',
                    'name' => 'Nabila Ichiko Hidayat',
                    'thumbnail' => asset('assets/finalist/semarang/mascot/2.jpg'),
                ],
                [
                    'school_name' => 'SMA YSKI SEMARANG',
                    'name' => 'Grace Natalie',
                    'thumbnail' => asset('assets/finalist/semarang/mascot/3.jpg'),
                ],
                [
                    'school_name' => 'SMAN 1 BERGAS',
                    'name' => 'Fany saputra',
                    'thumbnail' => asset('assets/finalist/semarang/mascot/4.jpg'),
                ],
                [
                    'school_name' => 'SMAN 13 SEMARANG',
                    'name' => 'Atina Balqis Izza',
                    'thumbnail' => asset('assets/finalist/semarang/mascot/5.jpg'),
                ],
            ],
        ],
        [
            'competition' => 'cheers',
            'label' => 'CHEERS & DANCING',
            'list' =>
            [
                [
                    'school_name' => 'SMA SINT LOUIS',
                    'name' => 'Michelle',
                    'thumbnail' => asset('assets/finalist/semarang/cheers/1.jpg'),
                ],
                [
                    'school_name' => 'SMAN 4 SEMARANG',
                    'name' => 'Bindy',
                    'thumbnail' => asset('assets/finalist/semarang/cheers/2.jpg'),
                ],
                [
                    'school_name' => 'SMA YSKI SEMARANG',
                    'name' => 'Elvina Faustine',
                    'thumbnail' => asset('assets/finalist/semarang/cheers/3.jpg'),
                ],
                [
                    'school_name' => 'SMAN 1 BERGAS',
                    'name' => 'Tasha Ratnadhita Sakanti',
                    'thumbnail' => asset('assets/finalist/semarang/cheers/4.jpg'),
                ],
                [
                    'school_name' => 'SMAN 8 SEMARANG',
                    'name' => 'alivia lutfiana putri',
                    'thumbnail' => asset('assets/finalist/semarang/cheers/5.jpg'),
                ],
            ],
        ],
        [
            'competition' => 'chats',
            'label' => 'CHANTS SUPPORTER',
            'list' => [
                [
                    'school_name' => 'SMA SINT LOUIS',
                    'name' => 'Jonathan',
                    'thumbnail' => asset('assets/finalist/semarang/chant/1.jpg'),
                ],
                [
                    'school_name' => 'SMAN 4 SEMARANG',
                    'name' => 'Faishal Rahman Irawan',
                    'thumbnail' => asset('assets/finalist/semarang/chant/2.jpg'),
                ],
                [
                    'school_name' => 'SMA YSKI SEMARANG',
                    'name' => 'Andika Inanugrahan',
                    'thumbnail' => asset('assets/finalist/semarang/chant/3.jpg'),
                ],
                [
                    'school_name' => 'SMAN 1 BERGAS',
                    'name' => 'Galang Adiyatma',
                    'thumbnail' => asset('assets/finalist/semarang/chant/4.jpg'),
                ],
                [
                    'school_name' => 'SMAN 16 SEMARANG',
                    'name' => 'Hambali',
                    'thumbnail' => asset('assets/finalist/semarang/chant/5.jpg'),
                ],
                [
                    'school_name' => 'SMAN 3 SEMARANG',
                    'name' => 'Alfredo Nabiha',
                    'thumbnail' => asset('assets/finalist/semarang/chant/6.jpg'),
                ],
            ],
        ],
        [
            'competition' => 'kolaborasa',
            'label' => 'KOLABORASA',
            'list' => [
                [
                    'school_name' => 'SMA SINT LOUIS',
                    'name' => 'Belva Maysha Putri',
                    'thumbnail' => asset('assets/finalist/semarang/kolaborasa/1.jpg'),
                ],
                [
                    'school_name' => 'SMAN 4 SEMARANG',
                    'name' => 'Katarina Prihastiningsih',
                    'thumbnail' => asset('assets/finalist/semarang/kolaborasa/2.jpg'),
                ],
                [
                    'school_name' => 'SMA YSKI SEMARANG',
                    'name' => 'Andika Inanugrahan',
                    'thumbnail' => asset('assets/finalist/semarang/kolaborasa/3.jpg'),
                ],
                [
                    'school_name' => 'SMAN 1 BERGAS',
                    'name' => 'Galang Adiyatma',
                    'thumbnail' => asset('assets/finalist/semarang/kolaborasa/4.jpg'),
                ]
            ],

        ]
    ];

    $finalistYogyakarta = [
        [
            'competition' => 'mascot',
            'label' => 'DESAIN MASKOT',
            'list' =>
            [
                [
                    'school_name' => 'SMAN 3 YOGYAKARTA',
                    'name' => 'Az Zahra Qyani Anadira',
                    'thumbnail' => asset('assets/finalist/yogyakarta/mascot/1.jpg'),
                ],
                [
                    'school_name' => 'SMAN 2 BANTUL',
                    'name' => 'Manis Madu Sekar',
                    'thumbnail' => asset('assets/finalist/yogyakarta/mascot/2.jpg'),
                ],
                [
                    'school_name' => 'SMKN 4 YOGYAKARTA',
                    'name' => 'Najwa',
                    'thumbnail' => asset('assets/finalist/yogyakarta/mascot/3.jpg'),
                ],
                [
                    'school_name' => 'SMKN 5 YOGYAKARTA',
                    'name' => 'Reyhan Nugroho',
                    'thumbnail' => asset('assets/finalist/yogyakarta/mascot/4.jpg'),
                ],
            ],
        ],
        [
            'competition' => 'cheers',
            'label' => 'CHEERS & DANCING',
            'list' =>
            [
                [
                    'school_name' => 'SMAN 3 YOGYAKARTA',
                    'name' => 'Arvia',
                    'thumbnail' => asset('assets/finalist/yogyakarta/cheers/1.jpg'),
                ],
                [
                    'school_name' => 'SMAN 2 BANTUL',
                    'name' => 'Latifa Faza Maulida',
                    'thumbnail' => asset('assets/finalist/yogyakarta/cheers/2.png'),
                ],
                [
                    'school_name' => 'SMAN1 BANTUL',
                    'name' => 'Alda',
                    'thumbnail' => asset('assets/finalist/yogyakarta/cheers/3.jpg'),
                ],
                [
                    'school_name' => 'SMAN 11 YOGYAKARTA',
                    'name' => 'Maria Saputri Meilind Jaladri',
                    'thumbnail' => asset('assets/finalist/yogyakarta/cheers/4.jpg'),
                ],
                [
                    'school_name' => 'SMAN 4 YOGYAKARTA',
                    'name' => 'Yasmin Maureta Az Zahra Padmasena',
                    'thumbnail' => asset('assets/finalist/yogyakarta/cheers/5.png'),
                ]

            ],
        ],
        [
            'competition' => 'chants',
            'label' => 'CHANTS SUPPORTER',
            'list' => [
                [
                    'school_name' => 'SMAN 3 YOGYAKARTA',
                    'name' => 'Ian dava Wardana',
                    'thumbnail' => asset('assets/finalist/yogyakarta/chant/1.jpg'),
                ],
                [
                    'school_name' => 'SMAN 2 BANTUL',
                    'name' => 'Ardian',
                    'thumbnail' => asset('assets/finalist/yogyakarta/chant/2.jpg'),
                ],
                [
                    'school_name' => 'SMAN 11 YOGYAKARTA',
                    'name' => 'Abimanyu Ridzki Putra Wardani',
                    'thumbnail' => asset('assets/finalist/yogyakarta/chant/3.jpg'),
                ]
            ],
        ],
        [
            'competition' => 'kolaborasa',
            'label' => 'KOLABORASA',
            'list' => [
                [
                    'school_name' => 'SMAN 2 BANTUL',
                    'name' => 'Atika Wajida Barka Ramadhani',
                    'thumbnail' => asset('assets/finalist/yogyakarta/kolaborasa/1.jpg'),
                ],
                [
                    'school_name' => 'SMAN1 BANTUL',
                    'name' => 'Tabita Silvera Edenia',
                    'thumbnail' => asset('assets/finalist/yogyakarta/kolaborasa/2.jpg'),
                ],
                [
                    'school_name' => 'SMAN 1 KASIHAN',
                    'name' => 'Vania',
                    'thumbnail' => asset('assets/finalist/yogyakarta/kolaborasa/3.jpg'),
                ]
            ]
        ]
    ];

    return Inertia::render(
        'Announcement',
        compact([
            'finalistSemarang',
            'finalistYogyakarta'
        ])
    );
})->name('announcement');

// Route::get('/dashboard', function () {
//     return redirect()->route('home');

//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/submission', function () {
        if (auth()->user()->submission) {
            return Inertia::render('SubmissionDone');
        }

        return Inertia::render('Upload');
    })->name('submission.create');

    Route::post('/submission', [UploadController::class, 'store'])->name('submission.store');

    // Route::put('/upload-filepond', [UploadController::class, 'uploadFilepond'])->name('test-upload.uploadFilepond');
    // Route::post('/upload-advanced', [UploadController::class, 'upload'])->name('test-upload.advance');


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
