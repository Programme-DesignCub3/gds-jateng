<?php

namespace App\Http\Controllers;

use App\Enums\CompetitionList;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class NewCompetitionController extends Controller
{   
    public function index(): Response
    {
        $data = [
            [
                'title' => "Modern Dance Competition",
                'shortDesc' => "<strong class='italic'> Gaya K-Pop, Gerak All Out! - </strong> Minimal 2 orang per tim, bawakan koreografi seru dengan sentuhan K-pop yang wajib ada! Tunjukkan gerakan paling kompak, paling gaya, dan paling nendang. <br> <br>
                Satu sekolah bisa kirim banyak tim, jadi ajak semua dancer andalan kamu.
                Saatnya tampil maksimal dan rebut hadiah jutaan rupiah!",
                'route' => "modern-dance-competition",
                'image' => "/assets/images/competition/overall/dance.png",
            ],
            [
                'title' => "Chant Supporter Competition",
                'shortDesc' => "<strong class='italic'> Kompak Nge-Chant, Bikin Sekolah Mentereng! - </strong> Kamu dan tim wajib tampil kompak, kreatif, dan penuh energi.Bikin chant versi kamu sendiri, dan jadi yang paling bersinar di panggung Schoolicious!",
                'route' => "chant-supporter-competition",
                'image' => "/assets/images/competition/overall/chant.png",
            ],
            [
                'title' => 'Kolaborasa',
                'shortDesc' => '<strong class="italic"> Nyambung Lagu, Nyatuin Rasa! - </strong> Formasi tim 4–5 orang, tebak clue, sambung lagu secara bergantian, dan tampil sekreatif mungkin! Outfit keren? Wajib. Kompak? Harus. Hadiah jutaan? Menanti!',
                'route' => 'kolaborasa',
                'image' => "/assets/images/competition/overall/kolaborasa-new.png",
            ]
        ];

        return Inertia::render('Competition/Index', [
            'competitionList' => $data
        ]);
    }

    public function show(string $slug)
    {
        $user = Auth::user();

        switch ($slug) {
            case 'modern-dance-competition':
                $data = [
                    'title' => 'Modern Dance Competition',
                    'slug' => 'modern-dance-competition',
                    'logoURL' => '/assets/images/competition/' . $slug . '/logo.png',
                    'description' => '<strong>MODERN DANCE COMPETITION – K-Pop Style, All-Out</strong>
                        <br><br>
                        Saatnya kamu dan tim tampil maksimal di <strong>Modern Dance Competition</strong>, salah satu ajang paling seru dari Good Day Schoolicious Jawa Tengah 2025!
                        <br><br>
                        Setiap grup minimal terdiri dari 2 orang, dengan koreografi yang <strong>wajib mengandung unsur K-pop.</strong> Boleh digabung dengan gaya lain, tapi sentuhan K-pop harus tetap terasa!
                        <br><br>
                        Satu sekolah bisa mengirimkan lebih dari satu tim, jadi ajak teman-teman terbaikmu untuk tampil dan bersinar bareng.
                        <br><br>
                        Tunjukkan gerakan yang kompak, kreatif, dan penuh energi. Siapa tahu, tim kamu jadi bintang panggung dan bawa <strong>pulang hadiah jutaan rupiah!</strong>
                        <br><br>
                        Yuk, gerakkan semangat dan bikin semua mata tertuju pada tim kamu!
                        <br><br>
                        #GDSModernDance #GoodDaySchoolicious2025',

                    'prize' => [
                        'imageUrl' => '/assets/images/competition/' . $slug . '/prize.png',
                        'desc' => '<strong class="text-xl"> Total Jutaan Rupiah untuk para pemenang Modern Dance Supporter Competition </strong> <br>
                                <br>
                                <div class="space-y-2">
                                <h3 class="font-bold text-lg">REWARD</h3>
                                <p class="font-semibold">Hadiah Tingkat Area :</p>
                                <ul class="list-none pl-0">
                                    <li>Juara 1 : Rp 1.500.000,-</li>
                                    <li>Juara 2 : Rp 1.000.000,-</li>
                                    <li>Juara 3 : Rp 750.000</li>
                                </ul>

                                <p class="font-semibold">Hadiah Tingkat Regional Jawa Tengah :</p>
                                <ul class="list-none pl-0">
                                    <li>Juara 1 : Rp 2.000.000,-</li>
                                    <li>Juara 2 : Rp 1.500.000,-</li>
                                </ul>
                            </div>'
                    ],

                    'jury' => [
                        [
                            'name' => 'MEET THE JUDGE',
                            'desc' => 'Safina Adriani adalah koreografer dan dancer multitalenta yang udah 14 tahun ngulik dunia dance dari panggung pertunjukan MV, sampe battle streetdance! Fokus di Waacking tapi jago juga di Hip Hop, Modern, dan Tari Kreasi—Safina udah koreo-in untuk MV Putri Ariani, MV Yura Yunita, bikin Waacking Dance Film dengan lagunya Isyana Sarasvati, dan tampil upcoming filmnya mas Wregas Bhanuteja. Sering banget jadi juri dan guest battle di event nasional, dan punya dance studio sendiri juga! Dari panggung World of Dance sampe MV K-Pop vibes, Safina always slays on and off stage!',
                            'image' => '/assets/images/competition/' . $slug . '/people.png',
                            'type' => 'SAFINA ADRIANI',
                            // 'akun_ig' => '@instagram_Juri'
                        ]
                    ],


                    'rules' => [
                        // 'file_url' => asset('rules/Rules Desain Maskot.pdf'),
                        'list' => '<div>
                                <h3 class="font-bold text-lg">RULES & REGULATION</h3>

                                <h4 class="mt-4 font-bold text-lg">DANCE PERFORMANCE (60%)</h4>
                                <ol class="list-none">
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">1.</span>
                                        <p class="text-lg">
                                            <span class="font-bold">Teknik Gerak — 15%:</span> Ketepatan, kontrol, dan kualitas teknik dalam setiap gerakan koreografi.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">2.</span>
                                        <p class="text-lg">
                                            <span class="font-bold">Detail Gerak & Kekompakan — 15%:</span> Sinkronisasi antar anggota, konsistensi, dan presisi gerakan dari awal hingga akhir.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">3.</span>
                                        <p class="text-lg">
                                            <span class="font-bold">Power — 15%:</span> Energi, kekuatan, dan intensitas dalam setiap gerakan.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">4.</span>
                                        <p class="text-lg">
                                            <span class="font-bold">Kreativitas Koreografi — 15%:</span> Keunikan konsep gerakan, transisi, eksplorasi ruang, dan penyatuan gaya K-pop dan elemen lain.
                                        </p>
                                    </li>
                                </ol>


                                <h4 class="mt-4 font-semibold">PRESENTATION (40%)</h4>
                                <ol class="list-none">
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">1.</span>
                                        <p class="text-lg">
                                            <span class="font-bold">Ekspresi & Penghayatan — 10%:</span> Ekspresi wajah dan bahasa tubuh yang sesuai dengan karakter lagu dan koreo.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">2.</span>
                                        <p class="text-lg">
                                            <span class="font-bold">Kostum & Make Up — 10%:</span> Kesesuaian outfit & riasan dengan tema, kerapian, dan kekompakan tim.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">3.</span>
                                        <p class="text-lg">
                                            <span class="font-bold">Kreativitas Properti — 10%:</span> Penggunaan properti tari yang mendukung penampilan dan storytelling.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">4.</span>
                                        <p class="text-lg">
                                            <span class="font-bold">Brand Integration (Opsional) — 10%:</span> Kreativitas dalam menyisipkan elemen visual atau gerakan yang berkaitan dengan brand Good Day (bisa properti, gestur, gaya, dll). Dapat disesuaikan dengan brief panitia.
                                        </p>
                                    </li>
                                </ol>

                                <h4 class="mt-4 font-semibold">CATATAN TEKNIS TAMBAHAN</h4>
                                <ul class="list-disc list-inside space-y-2 text-lg">
                                    <li>Jumlah anggota tim: minimal 2 orang.</li>
                                    <li>Unsur K-POP wajib hadir, namun bisa dikombinasikan dengan gaya tari lain.</li>
                                    <li>Satu sekolah boleh mengirimkan lebih dari satu tim.</li>
                                    <li>Penggunaan elemen brand Good Day bersifat wajib, seperti menggunakan kostum berwarna elemen brand Good Day Latte (merah & cream), membawa poster GDS 2025, membawa produk Good Day, dll.</li>
                                </ul>

                                </div>'
                    ]
                ];
                break;
            case 'chant-supporter-competition':
                $data = [
                    'title' => 'Chant Supporter Competition ',
                    'slug' => 'chant-supporter-competition',
                    'logoURL' => '/assets/images/competition/' . $slug . '/logo.png',
                    'description' => '<strong>CHANT SUPPORTER COMPETITION – Kompak Nge-Chant, Bikin Sekolah Mentereng!</strong>
                        <br><br>
                        Saatnya jadi tim paling heboh dan penuh energi di <strong>Chant Supporter Competition</strong>, bagian dari keseruan Good Day Schoolicious Jawa Tengah 2025!
                        <br><br>
                        Dengan minimal 10 orang per tim, kamu bisa mengadaptasi chant yang sudah ada, lalu tambahkan kreativitas khas tim kamu. Boleh pakai properti, gerakan seru, atau apapun yang bikin penampilan kalian makin unik dan mewakili semangat sekolah.
                        <br><br>
                        Semakin kompak, semakin heboh, dan semakin kreatif, makin besar peluang kamu jadi juara dan <strong>bawa pulang hadiah!</strong>
                        <br><br>
                        Tunjukkan siapa suporter paling solid dan paling total tahun ini!
                        <br><br>
                        #ChantSupporter #GoodDaySchoolicious2025',
                    'prize' => [
                        'imageUrl' => '/assets/images/competition/' . $slug . '/prize.png',
                        'desc' => '<strong class="text-xl"> Total Jutaan Rupiah untuk para pemenang Chant Supporter Competition </strong> <br>
                        <br>
                        <div class="space-y-2">
                        <h3 class="font-bold text-lg">REWARD</h3>
                        <p class="font-semibold">Hadiah Tingkat Area :</p>
                        <ul class="list-none pl-0">
                            <li>Juara 1 : Rp 1.500.000,-</li>
                            <li>Juara 2 : Rp 1.000.000,-</li>
                            <li>Juara 3 : Rp 750.000</li>
                        </ul>

                        <p class="font-semibold">Hadiah Tingkat Regional Jawa Tengah :</p>
                        <ul class="list-none pl-0">
                            <li>Juara 1 : Rp 2.000.000,-</li>
                            <li>Juara 2 : Rp 1.500.000,-</li>
                        </ul>
                    </div>'
                    ],
                    'jury' => [
                        [
                            'name' => 'MEET THE JUDGE',
                            'desc' => 'Ng. Sufendi Prasetio adalah coach & juri cheerleading yang udah main di level pro sejak 2015! International Certified sejak 2016, Sufendi pernah jadi safety staff di ACDC dan sekarang aktif ngelatih Nova Cheerleading. Pengalaman juri-nya segudang—dari Kejurda sampai Kejurnas, plus jadi juri di Good Day Schoolicious 2024! Dengan vibe tegas tapi chill, Sufendi adalah definisi coach yang paham teknik, disiplin, dan tetap asik diajak cheers bareng!',
                            'type' => 'SUFENDI',
                            'image' => '/assets/images/competition/' . $slug . '/sufendi.png',
                            // 'akun_ig' => '@instagram_Juri'
                        ]
                    ],
                    'rules' => [
                        // 'file_url' => asset('rules/Rules Chant Supporter.pdf'),
                        'list' => '<ol class="list-none space-y-4 text-lg">
                                <li class="flex items-start gap-3">
                                    <span class="font-bold">1.</span>
                                    <div>
                                    <p class="font-bold">Kekompakan Tim — 25%</p>
                                    <p>Keseragaman suara, gerakan, dan interaksi antar anggota saat menyuarakan chant.</p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="font-bold">2.</span>
                                    <div>
                                    <p class="font-bold">Kreativitas Chant & Gerakan — 25%</p>
                                    <p>Orisinalitas chant, modifikasi dari chant yang ada, penggunaan properti, koreografi, atau elemen pendukung lainnya.</p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="font-bold">3.</span>
                                    <div>
                                    <p class="font-bold">Semangat & Energi — 20%</p>
                                    <p>Antusiasme, ekspresi, dan totalitas tim dalam menyampaikan semangat sekolah.</p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="font-bold">4.</span>
                                    <div>
                                    <p class="font-bold">Representasi Sekolah — 15%</p>
                                    <p>Kemampuan chant & visual mendukung semangat, identitas, dan kebanggaan sekolah.</p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="font-bold">5.</span>
                                    <div>
                                    <p class="font-bold">Kualitas Video & Kepatuhan Format — 10%</p>
                                    <p>Format landscape 16:9, resolusi minimal 720p, tidak diedit, 1 file (maks. 250MB), thumbnail (maks. 3MB) dengan semua peserta terlihat jelas.</p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="font-bold">6.</span>
                                    <div>
                                    <p class="font-bold">Kejelasan Audio & Visual — 5%</p>
                                    <p>Chant terdengar jelas, gerakan dan ekspresi dapat terlihat dengan baik.</p>
                                    </div>
                                </li>
                                </ol>'
                    ]
                ];
                break;
            case 'kolaborasa':
                $data = [
                    'title' => 'Kolaborasa ',
                    'slug' => 'kolaborasa',
                    'logoURL' => '/assets/images/competition/' . $slug . '/logo.png',
                    'description' => '
                    <strong> KOLABORASA – Kolaborasi Rasa, Suara, dan Gaya! </strong>
                    <br> <br>
                    Siap-siap adu kekompakan bareng tim kamu di KOLABORASA, salah satu kompetisi paling rame di Good Day Schoolicious Jawa Tengah 2025!
                    <br> <br>
                    Bentuk tim berisi 4–5 orang, terus nyanyikan sambung lagu secara bergantian. Tapi ada tantangannya nih — kalian harus <strong> menebak dan menyambung lagu dari clue </strong> yang diberikan. Jadi, nggak cuma butuh suara kece, tapi juga otak encer dan kerja sama tim yang solid!
                    <br> <br>
                    Bebasin gaya kalian! Pakai outfit sekeren mungkin, ekspresikan karakter unik tim kamu, dan rekam penampilan dengan video yang jelas dan berkualitas.
                    <br> <br>
                    Tim dengan penampilan paling all out, kreatif, dan kompak bakal punya kesempatan menangin <strong> hadiah jutaan rupiah. </strong>
                    <br> Ini bukan sekadar nyanyi — ini ajang buat tampil beda dan jadi spotlight!
                    <br> <br>
                    #GDSKolaborasa #GoodDaySchoolicious2025

                    ',
                    'prize' => [
                        'imageUrl' => '/assets/images/competition/' . $slug . '/prize.png',
                        'desc' => '<strong class="text-xl"> Total Jutaan Rupiah untuk para pemenang Kolaborasa </strong> <br>
                        <br>
                        <div class="space-y-2">
                        <h3 class="font-bold text-lg">REWARD</h3>
                        <p class="font-semibold">Hadiah Tingkat Area :</p>
                        <ul class="list-none pl-0">
                            <li>Juara 1 : Rp 1.000.000,-</li>
                            <li>Juara 2 : Rp 750.000,-</li>
                            <li>Juara 3 : Rp 500.000</li>
                        </ul>

                        <p class="font-semibold">Hadiah Tingkat Regional Jawa Tengah :</p>
                        <ul class="list-none pl-0">
                            <li>Juara 1 : Rp 1.500.000,-</li>
                            <li>Juara 2 : Rp 1.000.000,-</li>
                        </ul>
                    </div>'
                    ],
                    'jury' => [
                        [
                            'name' => 'MEET THE JUDGE',
                            'desc' => 'Vialinda Dewi Fortuna, S.Tr.Sn biasa di panggil Vivi Fortuna adalah vokalis Gen Z berbakat jebolan ISI Jogja yang cumlaude! Aktif nyanyi dari panggung nasional sampai internasional, Vivi Fortuna pernah juara 1 di berbagai lomba vokal top, termasuk juara FLS2N Nasional dan BNN Nasional, bahkan tampil di Jepang! Selain jadi performer, dia juga sering jadi juri lomba solo vokal ataupun band, dan sekarang ngejalanin Fortuna Music—platform musik/ kursus musik miliknya sendiri. Skill? Komunikasi dan time management-nya top, plus hobi nyanyi & olahraga bikin dia makin all-rounder!',
                            'type' => 'VIVI FORTUNA',
                            'image' => '/assets/images/competition/' . $slug . '/juri.jpg',
                            // 'akun_ig' => '@instagram_Juri'
                        ]
                    ],
                    'rules' => [
                        // 'file_url' => asset('rules/Rules Kolaborasa.pdf'),
                        'list' => '<ol class="list-none space-y-4 text-lg">
                                    <li class="flex items-start gap-3 font">
                                        <span class="font-bold">1.</span>
                                        <div>
                                        <p class="font-bold">Kekompakan Tim — 25%</p>
                                        <p class="text-lg">Sinkronisasi antar anggota saat menyambung lagu, kerjasama dan chemistry.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">2.</span>
                                        <div>
                                        <p class="font-bold">Ketepatan Sambung Lagu — 20%</p>
                                        <p class="text-lg">Kemampuan menyambung lagu dan keselarasan pemenggalan lirik/frasering yang benar.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">3.</span>
                                        <div>
                                        <p class="font-bold">Kreativitas — 20%</p>
                                        <p class="text-lg">Penggunaan variasi lagu, gaya penampilan, dan improvisasi yang menarik.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">4.</span>
                                        <div>
                                        <p class="font-bold">Penguasaan Lagu — 20%</p>
                                        <p class="text-lg">Ketepatan nada, tempo, dan penguasaan lirik.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">5.</span>
                                        <div>
                                        <p class="font-bold">Ekspresi &amp; Penampilan — 15%</p>
                                        <p class="text-lg">Penjiwaan, interaksi dengan penonton, dan visual yang mendukung.</p>
                                        </div>
                                    </li>
                                    </ol>'
                    ]
                ];
                break;
            default:
                return redirect()->route('home');
        }
        $showButtons = false;

        if ($user) {
            // $user->competition sudah enum CompetitionList
            if ($user->competition instanceof CompetitionList && $user->competition->value === $slug) {
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
