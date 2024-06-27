<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;


class CompetitionController extends Controller
{
    /**
     * Display the overall competition.
     */
    public function index(): Response
    {

        $data = [
            [
                'title' => "Mascot Design",
                'shortDesc' => "Buat kamu yang jago gambar, tunjukkan karya terbaikmu dalam kompetisi Maskot Desain Good Day Schoolicious Good Challenge. Tuangkan rasa sportivitas dalam karyamu!",
                'route' => "mascot-design",
            ],
            [
                'title' => "Cheerleading Competition",
                'shortDesc' => "Berikan semangatmu dengan tim kebanggaanmu! Tunjukkan aksi paling spektakuler di Lomba Cheerleading 2024! Ayo bawa semangat dan sorak-sorai ke level yang lebih tinggi dan jadi bintang di panggung cheerleading ini.",
                'route' => "cheerleading",
            ],
            [
                'title' => 'Chants Competition',
                'shortDesc' => "Siapkan suara, latih gerakan dan bawa semangatmu! Ayo, meriahkan dengan chant-chant paling gokil dan jadi bintang di dunia supporter!",
                'route' => 'chants'
            ],
            [
                'title' => 'Kolaborasa',
                'shortDesc' => 'Buat kamu yang jago nyanyi dan ingin eksis, ikuti Kompetisi Kolaborasa dan ajak 3-4 temanmu untuk bernyanyi sambung lagu bersama dan tunjukkan kekompakan kalian!',
                'route' => 'kolaborasa'
            ]
        ];

        return Inertia::render('Competition/Index', ['competitionList' => $data]);
    }

    /**
     * Show the individual competition.
     */
    public function show(string $title): Response
    {
        switch ($title) {
            case 'mascot-design':
                $data = [
                    'title' => 'Mascot design',
                    'description' => 'Inilah kesempatanmu untuk berkreasi dalam Mascot Design Competition Good Day Schoolicious Good Challenge 2024.
                    <br/>

                    Kamu bisa menunjukkan kreativitas dan skill-mu dengan menciptakan karakter yang unik dan keren. Kami mengajak kamu untuk menggabungkan ide kreatif, teknik desain, dan pemahaman tentang konsep maskot untuk membuat karya yang penuh inovasi dengan rasa sportivitas',

                    'prize' => [
                        'imageUrl' => '',
                        'desc' => 'Tunjukkan penampilan terbaikmu dan dapatkan hadiah official merchandise Good Day, produk Good Day dan uang tunai'
                    ],

                    'jury' => [
                        [
                            'name' => 'Feri akbar',
                            'desc' => '',
                            'image' => '/assets/images/competition/' . $title . '/feri.jpg',
                            'type' => 'Dewan Juri',
                            'pengalaman' => [
                                'Art Director Kylindo',
                                'Juara 1 Komik Strip UnDip, dll',
                            ],
                            'akun_ig' => '@woketoon'
                        ]
                    ]
                ];
                break;
            case 'cheerleading':
                $data = [
                    'title' => 'Cheerleading Competition ',
                    'description' => 'Cheerleading itu nggak cuma tentang sorak-sorai dan gerakan keren, tapi juga tentang semangat, kerjasama tim, dan energi yang membara. Inilah kesempatankamu dan tim kamu untuk menunjukkan semangat sportivitas serta kreativitas yang kompak.',
                    'prize' => [
                        'imageUrl' => '',
                        'desc' => 'Tunjukkan penampilan terbaikmu dan dapatkan hadiah official merchandise Good Day, produk Good Day dan uang tunai.'
                    ],
                    'jury' => [
                        [
                            'name' => 'Sufendi Prasetio',
                            // 'desc' => 'lorem',
                            'type' => 'Dewan Juri',
                            'image' => '/assets/images/competition/' . $title . '/sufendi.jpg',
                            'pengalaman' => [
                                'Coach K1 heerleader',
                                'Judge UKSW LABCUP Cheers, dll',
                            ],
                            'akun_ig' => '@sufendipras'
                        ]
                    ]
                ];
                break;
            case 'chants':
                $data = [
                    'title' => 'Chant Competition ',
                    'description' => 'Di dunia olahraga, dukungan supporter itu penting banget buat nambah semangat tim yang bertanding. Nah, di lomba ini, kita bakal lihat siapa yang punya chant paling seru, kreatif! Lomba Chant Supporter ini adalah kesempatan kamu dan teman-teman buat kreativitas dan koreografi yang unik. Ini waktunya buat kalian tunjukin dukungan terbaik untuk tim kesayangan kalian!',
                    'prize' => [
                        'imageUrl' => '',
                        'desc' => 'Tunjukkan penampilan terbaikmu dan dapatkan hadiah official merchandise Good Day, produk Good Day dan uang tunai.'
                    ],
                    'jury' => [
                        [
                            'name' => 'Sufendi Prasetio',
                            // 'desc' => 'lorem',
                            'type' => 'Dewan Juri',
                            'image' => '/assets/images/competition/' . $title . '/sufendi.jpg',
                            'pengalaman' => [
                                'Coach K1 heerleader',
                                'Judge UKSW LABCUP Cheers, dll',
                            ],
                            'akun_ig' => '@sufendipras'
                        ]
                    ]
                ];
                break;
            case 'kolaborasa':
                $data = [
                    'title' => 'Chant Competition ',
                    'description' => '
                    Buat kamu yang jago nyanyi dan ingin eksis. Ikuti Kolaborasa Competition, ajak 3 teman kamu untuk bernyanyi sambung lagu bersama dan tunjukkan kekompakanmu! <br/> Pilih beberapa lagu favoritmu untuk dikreasikan bersama dengan teman - teman. Jangan lupa memakai oufit yang keren dan unik serta pengambilan video dengan kualitas yang baik.
                    ',
                    'prize' => [
                        'imageUrl' => '',
                        'desc' => 'Tunjukkan penampilan terbaikmu dan dapatkan hadiah official merchandise Good Day, produk Good Day dan uang tunai'
                    ],
                    'jury' => [
                        [
                            'name' => 'Vivi Fortuna',
                            // 'desc' => 'lorem',
                            'type' => 'Dewan Juri-Yogyakarta',
                            'image' => '/assets/images/competition/' . $title . '/vivi.jpg',
                            'pengalaman' => [
                                'Juara 1 Solo Vokal Pop Putri',
                                'Finalis Vokalis Lomba Band, dll'
                            ],
                            'akun_ig' => '@vivifortuna_'
                        ],
                        [
                            'name' => 'Farizal Sidik',
                            // 'desc' => 'lorem',
                            'type' => 'Dewan Juri-Semarang',
                            'image' => '/assets/images/competition/' . $title . '/faizal.jpg',
                            'pengalaman' => [
                                'Guru Maestro Music School',
                                'Guru yamaha Music'
                            ],
                            'akun_ig' => '@farizal Sidik'
                        ]
                    ]
                ];
                break;
            default:
                return redirect()->route('home');
        }

        return Inertia::render('Competition/Show', [
            'data' => $data
        ]);
    }
}
