<?php

namespace App\Http\Controllers;

use App\Enums\CompetitionList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function show(string $slug): Response
    {
        $user = Auth::user();

        switch ($slug) {
            case 'mascot-design':
                $data = [
                    'title' => 'Mascot design',
                    'slug' => 'mascot-design',
                    'description' => 'Inilah kesempatanmu untuk berkreasi dalam Mascot Design Competition Good Day Schoolicious Good Challenge 2024.
                    <br/>

                    Kamu bisa menunjukkan kreativitas dan skill-mu dengan menciptakan karakter yang unik dan keren. Kami mengajak kamu untuk menggabungkan ide kreatif, teknik desain, dan pemahaman tentang konsep maskot untuk membuat karya yang penuh inovasi dengan rasa sportivitas',

                    'prize' => [
                        'imageUrl' => '/assets/images/competition/' . $slug . '/prize.png',
                        'desc' => 'Tunjukkan penampilan terbaikmu dan dapatkan hadiah official merchandise Good Day, produk Good Day dan uang tunai!
                    <ul>
                     <li>
                        Juara 1 : Rp 1.750.000
                     </li>
                     <li>
                         Juara 2 : Rp 1.000.000
                     </li>
                     <li>
                         Juara Favorit : Rp 750.000
                     </li>
                    </ul>'
                    ],

                    'jury' => [
                        [
                            'name' => 'Feri akbar',
                            'desc' => 'Seorang desainer grafis berpengalaman dengan lebih dari 5 tahun berkecimpung di industri kreatif. Feri Akbar telah bekerja di berbagai proyek kreatif seperti Art Director di Kylindo, Juara 1 Komik Strip UNDIP dan pengalaman lainnya.',
                            'image' => '/assets/images/competition/' . $slug . '/feri.jpg',
                            'type' => 'Dewan Juri',
                            // 'pengalaman' => [
                            //     'Art Director Kylindo',
                            //     'Juara 1 Komik Strip UnDip, dll',
                            // ],
                            'akun_ig' => '@woketoon'
                        ]
                    ],


                    'rules' => [
                        'file_url' => asset('rules/Rules Desain Maskot.pdf'),
                        'list' => [
                            'foto yang di upload maksimal 3mb dalam bentuk JPEG atau PDF (2 foto : tampak depan dan belakang)',
                            'foto yang di upload harus terlihat jelas',
                            'foto thumbnail yang di upload maksimal 3mb dan seluruh peserta harus terlihat jelas'
                        ]
                    ]
                ];
                break;
            case 'cheerleading':
                $data = [
                    'title' => 'Cheerleading Competition ',
                    'slug' => 'cheerleading',
                    'description' => 'Cheerleading itu nggak cuma tentang sorak-sorai dan gerakan keren, tapi juga tentang semangat, kerjasama tim, dan energi yang membara. Inilah kesempatankamu dan tim kamu untuk menunjukkan semangat sportivitas serta kreativitas yang kompak.',
                    'prize' => [
                        'imageUrl' => '/assets/images/competition/' . $slug . '/prize.png',
                        'desc' => 'Tunjukkan penampilan terbaikmu dan dapatkan hadiah official merchandise Good Day, produk Good Day dan uang tunai!
                        <ul>
                            <li>
                                Juara 1 : Rp 1.750.000
                            </li>
                            <li>
                                Juara 2 : Rp 1.000.000
                            </li>
                            <li>
                                Juara Favorit : Rp 750.000
                            </li>

                        </ul>'
                    ],
                    'jury' => [
                        [
                            'name' => 'Sufendi Prasetio',
                            'desc' => 'Memiliki pengalaman  lebih dari 5 tahun dalam industri cheerleading, termasuk sebagai atlet, pelatih, dan juri seperti Coach K1 Cheerleader, Judge UKSW LABCUP Cheers dan masih banyak lagi',
                            'type' => 'Dewan Juri',
                            'image' => '/assets/images/competition/' . $slug . '/sufendi.jpg',
                            // 'pengalaman' => [
                            //     'Coach K1 heerleader',
                            //     'Judge UKSW LABCUP Cheers, dll',
                            // ],
                            'akun_ig' => '@sufendipras'
                        ]
                    ],
                    'rules' => [
                        'file_url' => asset('rules/Rules Cheerleader.pdf'),
                        'list' => [
                            'format video rekaman mp4 dengan format video 16:9 (landscape)',
                            'memiliki resolusi video minimal 720 pixel',
                            'video yang di upload maksimal 250mb dan berjumlah1 video tanpa edi',
                            'foto thumbnail yang di upload maksimal 3mb dan seluruh peserta harus terlihat jelas'
                        ]
                    ]
                ];
                break;
            case 'chants':
                $data = [
                    'title' => 'Chant Competition ',
                    'slug' => 'chants',
                    'description' => 'Di dunia olahraga, dukungan supporter itu penting banget buat nambah semangat tim yang bertanding. Nah, di lomba ini, kita bakal lihat siapa yang punya chant paling seru, kreatif! Lomba Chant Supporter ini adalah kesempatan kamu dan teman-teman buat kreativitas dan koreografi yang unik. Ini waktunya buat kalian tunjukin dukungan terbaik untuk tim kesayangan kalian!',
                    'prize' => [
                        'imageUrl' => '/assets/images/competition/' . $slug . '/prize.png',
                        'desc' => 'Tunjukkan penampilan terbaikmu dan dapatkan hadiah official merchandise Good Day, produk Good Day dan uang tunai!
                        <ul>
                            <li>
                                Juara 1 : Rp 1.750.000
                            </li>
                            <li>
                                Juara 2 : Rp 1.000.000
                            </li>
                            <li>
                                Juara Favorit : Rp 750.000
                            </li>
                        </ul>'
                    ],
                    'jury' => [
                        [
                            'name' => 'Sufendi Prasetio',
                            'desc' => 'Memiliki pengalaman  lebih dari 5 tahun dalam industri cheerleading, termasuk sebagai atlet, pelatih, dan juri seperti Coach K1 Cheerleader, Judge UKSW LABCUP Cheers dan masih banyak lagi',
                            'type' => 'Dewan Juri',
                            'image' => '/assets/images/competition/' . $slug . '/sufendi.jpg',
                            // 'pengalaman' => [
                            //     'Coach K1 heerleader',
                            //     'Judge UKSW LABCUP Cheers, dll',
                            // ],
                            'akun_ig' => '@sufendipras'
                        ]
                    ],
                    'rules' => [
                        'file_url' => asset('rules/Rules Chant Supporter.pdf'),
                        'list' => [
                            'format video rekaman mp4 dengan format video 16:9 (landscape)',
                            'memiliki resolusi video minimal 720 pixel',
                            'video yang di upload maksimal 250mb dan berjumlah1 video tanpa edi',
                            'foto thumbnail yang di upload maksimal 3mb dan seluruh peserta harus terlihat jelas'
                        ]
                    ]

                ];
                break;
            case 'kolaborasa':
                $data = [
                    'title' => 'Kolaborasa ',
                    'slug' => 'kolaborasa',
                    'description' => '
                    Buat kamu yang jago nyanyi dan ingin eksis. Ikuti Kolaborasa Competition, ajak 3 teman kamu untuk bernyanyi sambung lagu bersama dan tunjukkan kekompakanmu! <br/> Pilih beberapa lagu favoritmu untuk dikreasikan bersama dengan teman - teman. Jangan lupa memakai oufit yang keren dan unik serta pengambilan video dengan kualitas yang baik.
                    ',
                    'prize' => [
                        'imageUrl' => '/assets/images/competition/' . $slug . '/prize.png',
                        'desc' => 'Tunjukkan penampilan terbaikmu dan dapatkan hadiah official merchandise Good Day, produk Good Day dan uang tunai!
                        <ul>
                            <li>
                                Juara 1 : Rp 1.750.000
                            </li>
                            <li>
                                Juara 2 : Rp 1.250.000
                            </li>
                            <li>
                                Juara Favorit : Rp 1.000.000
                            </li>
                        </ul>'
                    ],
                    'jury' => [
                        [
                            'name' => 'Vivi Fortuna',
                            'desc' => 'Seorang musisi berpengalaman dengan latar belakang yang luas dalam industri musik. Dengan lebih dari 5 tahun berkarir, ia telah berkontribusi dalam berbagai proyek musik  seperti Juara 1 Solo Vokal Pop Putri, Finalis Vokalis Lomba Band, dll',
                            'type' => 'Dewan Juri-Yogyakarta',
                            'image' => '/assets/images/competition/' . $slug . '/vivi.jpg',
                            // 'pengalaman' => [
                            //     'Juara 1 Solo Vokal Pop Putri',
                            //     'Finalis Vokalis Lomba Band, dll'
                            // ],
                            'akun_ig' => '@vivifortuna_'
                        ],
                        [
                            'name' => 'Farizal Sidik',
                            'desc' => 'Seorang musisi berpengalaman dengan latar belakang yang luas dalam industri musik. Dengan lebih dari 5 tahun berkarir, ia telah berkontribusi dalam berbagai proyek musik  seperti Guru Maestro Music School, Guru yamaha Music, dll',
                            'type' => 'Dewan Juri-Semarang',
                            'image' => '/assets/images/competition/' . $slug . '/faizal.jpg',
                            // 'pengalaman' => [
                            //     'Guru Maestro Music School',
                            //     'Guru yamaha Music'
                            // ],
                            'akun_ig' => '@farizal Sidik'
                        ]
                    ],
                    'rules' => [
                        'file_url' => asset('rules/Rules Kolaborasa.pdf'),
                        'list' => [
                            'format video rekaman mp4 dengan format video 9:16 (portrait)',
                            'memiliki resolusi video minimal 720 pixel',
                            'video yang di upload maksimal 250mb dan berjumlah1 video tanpa edit',
                            'foto thumbnail yang di upload maksimal 3mb dan seluruh peserta harus terlihat jelas'
                        ]
                    ]
                ];
                break;
            default:
                return redirect()->route('home');
        }


        $showButtons = false;

        if ($user) {

            $school_competition = [
                CompetitionList::MASCOT->value,
                CompetitionList::CHEERLEADING->value,
                CompetitionList::CHANTS->value,
            ];

            $personal_competition = [
                CompetitionList::KOLABORASA->value,
            ];

            $final_competition =
                $user->is_school_account ? $school_competition : $personal_competition;


            if (
                in_array($user->competition->value, $final_competition)
                && $user->competition->value === $slug
            ) {
                $showButtons = true;
            }
        } else {
            $showButtons = true;
        }

        return Inertia::render('Competition/Show', [
            'data' => $data,
            'showButtons' => $showButtons,

        ]);
    }
}
