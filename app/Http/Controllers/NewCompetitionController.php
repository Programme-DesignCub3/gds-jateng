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
                'shortDesc' => "<strong>Every Move Tells Your Story.</strong>
                                <br>
                                Gerakan yang kompak, ekspresi yang kuat, dan energi yang nggak habis-habis. Tampilkan koreografi terbaik bersama tim minimal 3 orang, eksplorasi kreativitasmu, dan buat setiap detik di atas panggung jadi momen yang berkesan. Siap tampil maksimal dan menangkan hadiah jutaan rupiah?",
                'route' => "modern-dance-competition",
                'image' => "/assets/images/gds-2026/kompetisi/logo-modern-dance.png",
            ],
            [
                'title' => "Chant Supporter Competition",
                'shortDesc' => "<strong>Make Some Noise for Your School!</strong>
                                <br>
                                Inilah saatnya menunjukkan kebanggaan terhadap sekolahmu! Bentuk tim beranggotakan <strong>10–30 siswa</strong> sebagai representasi resmi sekolah, ciptakan chant yang unik, tampil penuh semangat, dan kuasai panggung dengan energi yang nggak ada habisnya. Karena supporter terbaik bukan yang paling keras, tapi yang paling kompak!",
                'route' => "chant-supporter-competition",
                'image' => "/assets/images/gds-2026/kompetisi/logo-chant-supporter.png",
            ],
            [
                'title' => "Vlog Competition",
                'shortDesc' => "<strong>Create. Share. Inspire.</strong>
                                <br>
                                Saatnya jadi content creator! Buat vlog school life yang autentik, tampilkan <strong>Good Day</strong> secara natural, lalu upload ke <strong>TikTok</strong> dengan hashtag resmi. Kreativitas dan engagement sama-sama menentukan kemenanganmu.",
                'route' => "vlog-competition",
                'image' => "/assets/images/gds-2026/kompetisi/logo-vlog.png",
            ],
            [
                'title' => 'Kolaborasa',
                'shortDesc' => '<strong>Playlist Boleh Beda, Vibes Harus Sama! </strong>
                                <br>
                                Kumpulkan <strong>4–5 teman</strong>, pecahkan clue, lanjutkan lagu, dan tampil sekreatif mungkin di depan semua orang. Siapkan outfit terbaik, bawa energi paling seru, dan jadilah squad yang paling bersinar. Hadiah jutaan siap menunggumu!',
                'route' => 'kolaborasa',
                'image' => "/assets/images/gds-2026/kompetisi/logo-kolaborasa.png",
            ],
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
                    'logoURL' => '/assets/images/gds-2026/kompetisi/' . $slug . '/logo.png',
                    'description' => '<h2><strong>MODERN DANCE COMPETITION – Move Your Way, Own the Stage!</strong></h2>
                        <br>
                        Saatnya kamu dan squad menunjukkan energi, kreativitas, dan gaya terbaikmu di <strong>Modern Dance Competition Good Day Schoolicious Good Challenge 2026!</strong> Bentuk tim minimal <strong>3 siswa/siswi</strong> dan bebas berkolaborasi dengan teman dari <string>sekolah lain—</strong>karena semakin banyak energi dan karakter yang bergabung, semakin seru penampilanmu! Ciptakan performance video dengan koreografi yang kreatif, powerful, dan penuh personality, lalu hadirkan <strong>Good Day Latte</strong> secara natural di dalamnya. Bukan cuma soal gerakan yang kompak, tapi bagaimana timmu bisa membawa semangat anak muda, menciptakan vibe yang positif, dan membuat setiap gerakan punya cerita. Upload karya terbaikmu melalui <strong>website dan TikTok</strong>, karena perjalananmu nggak berhenti di kompetisi—<strong>2 tim terbaik dari setiap area akan mendapatkan kesempatan untuk tampil di panggung Big Bang Stage 2!</strong> Jadi, kumpulkan squad-mu, bebasin gaya, dan tunjukkan kalau <strong>your moves, your energy, your moment</strong>!',

                    'prize' => [
                        'imageUrl' => '/assets/images/gds-2026/kompetisi/' . $slug . '/prize.png',
                        'desc' => '<strong class="text-xl"> Total Jutaan Rupiah untuk para pemenang Modern Dance Supporter Competition </strong> <br>
                                <br>
                                <div class="space-y-2">
                                    <h3 class="font-bold">REWARD</h3>
                                    <p class="font-semibold">Hadiah Tingkat Area :</p>
                                    <ul class="list-none pl-0">
                                        <li>Juara 1 : Rp 1.000.000,-</li>
                                        <li>Juara 2 : Rp 750.000,-</li>
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
                            'name' => 'MEET THE JUDGE <br> SAFINA ADRIANI',
                            'desc' => '<br>Kenalan dengan <strong>Safina Adriani</strong>, dancer dan koreografer multitalenta yang sudah lebih dari <strong>14 tahun berkarya di dunia dance</strong>. Dari panggung pertunjukan, music video, hingga street dance battle, Safina terus mengeksplorasi berbagai gaya dengan <strong>Waacking sebagai salah satu spesialisasinya</strong>, sekaligus menguasai Hip Hop, Modern Dance, dan Tari Kreasi.
                            <br>
                            <br>
                            Pengalamannya juga nggak main-main! Safina telah terlibat dalam koreografi <string>MV Putri Ariani dan Yura Yunita</strong>, membuat Waacking Dance Film dengan karya musik <strong>Isyana Sarasvati</strong>, hingga terlibat dalam proyek film garapan <strong>Wregas Bhanuteja</strong>. Ia juga aktif sebagai juri dan guest battle di berbagai event dance nasional, sekaligus mengembangkan passion-nya melalui dance studio yang ia dirikan.
                            <br>
                            Dengan pengalaman dan kreativitasnya, <strong>Safina siap melihat siapa yang punya moves, energy, dan personality paling standout di Good Day Schoolicious Good Challenge 2026!</strong>
',
                            'image' => '/assets/images/gds-2026/kompetisi/' . $slug . '/safina.jpeg',
                            // 'image2' => '/assets/images/gds-2026/kompetisi/' . $slug . '/vivi.jpeg',
                            // 'type' => 'SAFINA ADRIANI',
                            // 'akun_ig' => '@instagram_Juri'
                        ]
                    ],

                    'rules' => [
                        // 'file_url' => asset('rules/Rules Desain Maskot.pdf'),
                        'list' => '<div>
                                <h3 class="font-bold">RULES & REGULATION</h3>

                                <h4 class="mt-4 font-bold italic">DANCE PERFORMANCE ( 60% )</h4>
                                <ol class="mt-2 space-y-3 list-none">
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold italic">1.</span>
                                        <p class=">
                                            <span class="font-bold">Movement Technique — 15%</span><br>
                                            Tunjukkan teknik, kontrol, dan kualitas gerakanmu.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold italic">2.</span>
                                        <p class=">
                                            <span class="font-bold">Team Synchronization — 15%</span><br>
                                            Seberapa kompak timmu bergerak sebagai satu kesatuan?
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold italic">3.</span>
                                        <p class=">
                                            <span class="font-bold">Power & Energy — 15%</span><br>
                                            Bawa energi maksimal dari awal sampai akhir!
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold italic">4.</span>
                                        <p class=">
                                            <span class="font-bold">Choreography Creativity — 15%</span><br>
                                            Hadirkan koreografi yang fresh, unik, dan punya karakter.
                                        </p>
                                    </li>
                                </ol>

                                <h4 class="mt-6 font-bold italic">PRESENTATION ( 40% )</h4>
                                <ol class="mt-2 space-y-3 list-none">
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold italic">1.</span>
                                        <p class=">
                                            <span class="font-bold">Expression & Performance — 10%</span><br>
                                            Bikin setiap gerakan terasa hidup dan penuh ekspresi.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold italic">2.</span>
                                        <p class=">
                                            <span class="font-bold">Costume & Styling — 10%</span><br>
                                            Tampilkan look yang mendukung karakter dan konsep tim.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold italic">3.</span>
                                        <p class=">
                                            <span class="font-bold">Property Creativity — 10%</span><br>
                                            Manfaatkan properti secara kreatif untuk memperkuat performance.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold italic">4.</span>
                                        <p class=">
                                            <span class="font-bold">Brand Integration — 10%</span><br>
                                            Hadirkan <span class="font-bold">Good Day Latte</span> secara natural dan kreatif dalam penampilanmu.
                                        </p>
                                    </li>
                                </ol>

                                <h3 class="mt-8 font-bold">PERFORMANCE RULES</h3>

                                <ul class="mt-4 space-y-3 list-none">
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">-</span>
                                        <p class=">
                                            <span class="font-bold">Team:</span> Minimal <span class="font-bold">3 siswa/siswi</span> per tim.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">-</span>
                                        <p class=">
                                            <span class="font-bold">Cross-School Collaboration:</span> Anggota tim boleh berasal dari <span class="font-bold">sekolah yang berbeda</span>.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">-</span>
                                        <p class=">
                                            <span class="font-bold">Performance Video:</span> Buat dance performance yang original, kreatif, dan penuh energi.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">-</span>
                                        <p class=">
                                            <span class="font-bold">Good Day Integration:</span> Wajib mengintegrasikan <span class="font-bold">Good Day Latte</span> secara natural & creative-led.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">-</span>
                                        <p class=">
                                            <span class="font-bold">Submission:</span> Upload video melalui <span class="font-bold">website</span> dan <span class="font-bold">TikTok</span> sesuai ketentuan yang berlaku.
                                        </p>
                                    </li>
                                </ul>
                            </div>'
                    ]
                ];
                break;
            case 'chant-supporter-competition':
                $data = [
                    'title' => 'Chant Supporter Competition ',
                    'slug' => 'chant-supporter-competition',
                    'logoURL' => '/assets/images/gds-2026/kompetisi/' . $slug . '/logo.png',
                    'description' => '<h2><strong>CHANT SUPPORTER COMPETITION – One Voice, One Spirit, One School!</strong></h2><br>
                                    Saatnya satukan suara dan bawa semangat sekolahmu ke panggung <strong>Good Day Schoolicious Good Challenge 2026</strong>! Bentuk satu tim berisi <strong>10–30 siswa sebagai representasi resmi sekolah,</strong> lalu ciptakan chant paling kreatif dengan gaya khas tim kamu. Bebas eksplorasi gerakan, properti, koreografi, dan berbagai aksi seru untuk membuat penampilanmu semakin standout. Bukan cuma soal siapa yang paling keras, tapi siapa yang paling <strong>kompak, kreatif, dan mampu membawa school spirit</strong> ke level berikutnya. <strong>Siap bikin sekolahmu ikut bergemuruh?</strong>',

                    'prize' => [
                        'imageUrl' => '/assets/images/gds-2026/kompetisi/' . $slug . '/prize.png',
                        'desc' => '<strong class="text-xl"> Total Jutaan Rupiah untuk para pemenang Chant Supporter Competition </strong> <br>
                                <br>
                                <div class="space-y-2">
                                    <h3 class="font-bold">REWARD</h3>
                                    <p class="font-semibold">Hadiah Tingkat Area :</p>
                                    <ul class="list-none pl-0">
                                        <li>Juara 1 : Rp 1.500.000,-</li>
                                        <li>Juara 2 : Rp 1.000.000,-</li>
                                        <li>Juara 3 : Rp 750.000,-</li>
                                    </ul>

                                    <p class="font-semibold">Hadiah Tingkat Regional Jawa Tengah :</p>
                                    <ul class="list-none pl-0">
                                        <li>Juara 1 : Rp 2.000.000,-</li>
                                        <li>Juara 2 : Rp 1.500.000,-</li>
                                        <li>Juara 3 : Rp 1.000.000,-</li>
                                    </ul>
                                </div>'
                    ],

                    'jury' => [
                        [
                            'name' => 'Safina Adriani &  Vivi Fortuna',
                            'desc' => ' <br><strong>Two talents. One stage. One school spirit!</strong>
                                    <br>
                                    <br>
                                    Untuk <strong>Chant Supporter Competition</strong>, penampilanmu akan dinilai dari dua sisi: <strong>choreography & movement</strong> bersama Safina Adriani, serta <strong>vocal & chant performance</strong> bersama Vivi Fortuna.
                                    <br>
                                    <br>
                                    <strong>Safina Adriani</strong>
                                    Dengan pengalaman lebih dari <strong>14 tahun di dunia dance</strong>, Safina dikenal sebagai dancer dan koreografer dengan spesialisasi <strong>Waacking</strong>, serta berpengalaman di Hip Hop, Modern Dance, dan Tari Kreasi. Pernah terlibat dalam koreografi <strong>MV Putri Ariani dan Yura Yunita</strong>, Safina akan melihat <strong>kekompakan gerakan, formasi, kreativitas, dan stage presence</strong> timmu.
                                    <br>
                                    <br>
                                    <strong>Vivi Fortuna</strong>
                                    Lulusan <strong>ISI Yogyakarta dengan predikat Cum Laude</strong>, Vivi adalah penyanyi berprestasi dengan pengalaman nasional hingga internasional, termasuk <strong>Juara 1 FLS2N Nasional dan BNN Nasional</strong>. Aktif sebagai performer dan juri kompetisi vokal, Vivi akan fokus menilai <strong>kekuatan suara, artikulasi chant, musikalitas, dan energi vokal</strong> timmu.
                                    <br>
                                    <br>
                                    <strong>Ready to Make Some Noise? <br>
                                    Bring the voice. Bring the moves. Bring your school spirit!</strong>
',
                            'image' => '/assets/images/gds-2026/kompetisi/' . $slug . '/safina.jpeg',
                            'image2' => '/assets/images/gds-2026/kompetisi/' . $slug . '/vivi.jpeg',
                            // 'type' => 'SAFINA ADRIANI',
                            // 'akun_ig' => '@instagram_Juri'
                        ]
                    ],

                    'rules' => [
                        // 'file_url' => asset('rules/Rules Desain Maskot.pdf'),
                        'list' => '<div>
                                <h3 class="font-bold">RULES & REGULATION</h3>

                                <ol class="mt-4 space-y-3 list-none">
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold italic">1.</span>
                                        <p class=">
                                            <span class="font-bold">Team Synchronization — 35%</span><br>
                                            Seberapa kompak suara, gerakan, dan formasi timmu saat tampil?
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold italic">2.</span>
                                        <p class=">
                                            <span class="font-bold">Chant & Movement Creativity — 30%</span><br>
                                            Hadirkan chant, gerakan, dan konsep sekreatif mungkin untuk membuat penampilanmu standout.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold italic">3.</span>
                                        <p class=">
                                            <span class="font-bold">Spirit & Energy — 20%</span><br>
                                            Bawa energi terbaikmu dan tunjukkan semangat sekolah yang bisa bikin seluruh crowd ikut hype!
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold italic">4.</span>
                                        <p class=">
                                            <span class="font-bold">Chant Articulation — 15%</span><br>
                                            Pastikan setiap chant terdengar jelas, powerful, dan mudah ditangkap oleh penonton.
                                        </p>
                                    </li>
                                </ol>

                                <h3 class="mt-8 font-bold">PERFORMANCE RULES</h3>

                                <ul class="mt-4 space-y-3 list-none">
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">•</span>
                                        <p class=">
                                            <span class="font-bold">Team Size:</span> 1 tim terdiri dari <span class="font-bold">10–30 siswa/siswi</span> sebagai representasi resmi sekolah.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">•</span>
                                        <p class=">
                                            <span class="font-bold">School Representation:</span> Setiap tim wajib mewakili <span class="font-bold">satu sekolah</span>.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">•</span>
                                        <p class=">
                                            <span class="font-bold">Chant:</span> Boleh menggunakan chant yang sudah ada dengan adaptasi kreatif atau membuat chant original.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">•</span>
                                        <p class=">
                                            <span class="font-bold">Performance:</span> Wajib menampilkan kombinasi <span class="font-bold">chant, movement, dan teamwork</span> yang kompak.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">•</span>
                                        <p class=">
                                            <span class="font-bold">Creative Props:</span> Properti diperbolehkan selama aman dan mendukung konsep penampilan.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">•</span>
                                        <p class=">
                                            <span class="font-bold">School Spirit:</span> Tampilkan karakter, identitas, dan semangat positif sekolahmu.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">•</span>
                                        <p class=">
                                            <span class="font-bold">Good Day Integration:</span> Integrasikan <span class="font-bold">Good Day</span> secara natural dan kreatif dalam performance.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">•</span>
                                        <p class=">
                                            <span class="font-bold">Respect & Fair Play:</span> Tidak diperbolehkan mengandung unsur SARA, bullying, profanity, atau konten yang menyerang pihak lain.
                                        </p>
                                    </li>
                                </ul>
                            </div>'
                    ]
                ];
                break;
            case 'vlog-competition':
                $data = [
                    'title' => 'Vlog Competition',
                    'slug' => 'vlog-competition',
                    'logoURL' => '/assets/images/gds-2026/kompetisi/' . $slug . '/logo.png',
                    'description' => '<br><h2><strong>VLOG COMPETITION – Your Story, Your Vibe, Your School!</strong></h2>
                                <br>
                                <br>
                                Punya cerita seru tentang school life? Saatnya jadi <strong>content creator versi kamu</strong> di Vlog Competition Good Day Schoolicious Good Challenge 2026! Kompetisi ini terbuka untuk <strong>seluruh siswa secara individu</strong>, jadi nggak perlu nunggu squad untuk ikut seru-seruan. Buat vlog original di <strong>sekolah, kantin, atau rumah dengan seragam sekolah</strong>, lalu ceritakan momen dan kreativitasmu dengan cara yang paling autentik. 
                                <br>
                                <br>
                                Jangan lupa hadirkan <strong>Good day schoolicious</strong> secara natural dan kreatif di dalam kontenmu, kemudian upload ke TikTok dengan hashtag dan tag akun resmi Good Day. Karena di sini, bukan cuma konten yang keren yang dicari—<strong>50% Content Quality + 50% Engagement</strong> akan menentukan siapa yang paling standout! 
',

                    'prize' => [
                        'imageUrl' => '/assets/images/gds-2026/kompetisi/' . $slug . '/prize.png',
                        'desc' => '<strong class="text-xl"> Total Jutaan Rupiah untuk para pemenang Vlog Competition </strong> <br>
                                <br>
                                <div class="space-y-2">
                                    <h3 class="font-bold">REWARD</h3>
                                    <p class="font-semibold">Hadiah Tingkat Regional :</p>
                                    <ul class="list-none pl-0">
                                        <li>Juara 1 : Rp 1.000.000,-</li>
                                        <li>Juara 2 : Rp 750.000,-</li>
                                    </ul>

                                    
                                </div>'
                    ],

                    // 'jury' => [
                    //     [
                    //         'name' => 'SAFINA & FIFI',
                    //         'desc' => ' Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.',
                    //         'image' => '/assets/images/gds-2026/kompetisi/' . $slug . '/safina.jpeg',
                    //         'image2' => '/assets/images/gds-2026/kompetisi/' . $slug . '/vivi.jpeg',
                    //         // 'type' => 'SAFINA ADRIANI',
                    //         // 'akun_ig' => '@instagram_Juri'
                    //     ]
                    // ],

                    'rules' => [
                        // 'file_url' => asset('rules/Rules Desain Maskot.pdf'),
                        'list' => '<div>
                                <h3 class="font-bold">RULES & REGULATION</h3>

                                <ol class="mt-4 space-y-3 list-none">
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold italic">1.</span>
                                        <p class=">
                                            <span class="font-bold">Content Creativity — 30%</span><br>
                                            Hadirkan ide yang fresh, unik, dan punya gaya khas kamu.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold italic">2.</span>
                                        <p class=">
                                            <span class="font-bold">Storytelling & Relevance — 25%</span><br>
                                            Ceritakan school life dengan alur yang menarik dan relate dengan kehidupan anak muda.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold italic">3.</span>
                                        <p class=">
                                            <span class="font-bold">Good Day Integration — 20%</span><br>
                                            Integrasikan <span class="font-bold">Good day schoolicious</span> secara natural, kreatif, dan tidak terasa dipaksakan.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold italic">4.</span>
                                        <p class=">
                                            <span class="font-bold">Expression & Content Delivery — 15%</span><br>
                                            Tunjukkan personality, ekspresi, dan cara penyampaian yang engaging.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold italic">5.</span>
                                        <p class=">
                                            <span class="font-bold">Engagement Performance — 10%</span><br>
                                            Ajak audience untuk like, comment, share, dan ikut menikmati ceritamu!
                                        </p>
                                    </li>
                                </ol>

                                <h3 class="mt-8 font-bold">PERFORMANCE RULES</h3>

                                <ul class="mt-4 space-y-3 list-none">
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">•</span>
                                        <p class=">
                                            <span class="font-bold">Open for All Students:</span> Kompetisi bersifat individual dan terbuka untuk seluruh siswa.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">•</span>
                                        <p class=">
                                            <span class="font-bold">Real School Life:</span> Konten wajib menggambarkan keseharian atau suasana school life dan dapat dibuat di <span class="font-bold">sekolah, kantin, atau rumah</span> dengan <span class="font-bold">seragam sekolah</span>.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">•</span>
                                        <p class=">
                                            <span class="font-bold">Original Content:</span> Video harus merupakan karya original peserta dan belum pernah memenangkan kompetisi lain.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">•</span>
                                        <p class=">
                                            <span class="font-bold">Good Day Integration:</span> Wajib menampilkan dan mengintegrasikan <span class="font-bold">Good day schoolicious</span> secara natural dan kreatif.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">•</span>
                                        <p class=">
                                            <span class="font-bold">TikTok Submission:</span> Upload video di <span class="font-bold">TikTok</span>, gunakan hashtag resmi dan <span class="font-bold">tag akun Good Day</span> sesuai ketentuan.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">•</span>
                                        <p class=">
                                            <span class="font-bold">Video Format:</span> Pastikan video dibuat dalam format <span class="font-bold">vertical 9:16</span> dan mudah ditonton di mobile.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">•</span>
                                        <p class=">
                                            <span class="font-bold">Positive Content:</span> Konten tidak boleh mengandung unsur SARA, bullying, profanity, pornografi, kekerasan, atau konten yang merugikan pihak lain.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">•</span>
                                        <p class=">
                                            <span class="font-bold">Engagement:</span> Pastikan akun dan konten dapat diakses secara <span class="font-bold">public</span> selama periode penilaian agar engagement dapat dihitung.
                                        </p>
                                    </li>
                                </ul>
                            </div>'
                    ]
                ];
                break;
            case 'kolaborasa':
                $data = [
                    'title' => 'Kolaborasa ',
                    'slug' => 'kolaborasa',
                    'logoURL' => '/assets/images/gds-2026/kompetisi/' . $slug . '/logo.png',
                    'description' => '<h2><strong>KOLABORASA – Saatnya Satu Nada, Satu Vibes!</strong></h2>
                                <br>
                                Siapa bilang beda playlist nggak bisa satu panggung? Di <strong>KOLABORASA</strong>, kamu dan squad akan diuji lewat tantangan sambung lagu yang mengandalkan kekompakan, kecepatan berpikir, dan chemistry tim.
                                <br>
                                <br>
                                Bentuk tim berisi <strong>4–5 orang</strong>, pecahkan clue yang diberikan, lalu lanjutkan lagu secara bergantian tanpa kehilangan momentum. Semakin kompak, semakin kreatif, dan semakin seru penampilanmu, semakin besar peluang untuk mencuri perhatian para juri.
                                <br>
                                <br>
                                Jangan lupa tampil dengan outfit terbaik dan bawa energi yang bikin semua orang ikut bernyanyi. Karena di KOLABORASA, bukan cuma suara yang dinilai, tapi juga cara timmu menghidupkan suasana.
                                <br>
                                <br>
                                <strong>Siap jadi squad paling bersinar di Good Day Schoolicious Good Challenge 2026?</strong> Hadiah jutaan rupiah menantimu!',

                    'prize' => [
                        'imageUrl' => '/assets/images/gds-2026/kompetisi/' . $slug . '/prize.png',
                        'desc' => '<strong class="text-xl"> Total Jutaan Rupiah untuk para pemenang Kolaborasa </strong> <br>
                                <br>
                                <div class="space-y-2">
                                    <h3 class="font-bold">REWARD</h3>
                                    <p class="font-semibold">Hadiah Tingkat Area :</p>
                                    <ul class="list-none pl-0">
                                        <li>Juara 1 : Rp 1.000.000,-</li>
                                        <li>Juara 2 : Rp 750.000,-</li>
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
                            'name' => 'MEET THE JUDGE <br> VIVI FORTUNA 🎤✨',
                            'desc' => '<br>Kenalan sama <strong>Vivi Fortuna</strong>, penyanyi muda berbakat lulusan <strong>ISI Yogyakarta</strong> dengan predikat <strong>Cum Laude</strong> yang siap jadi salah satu juri di <strong>Good Day Schoolicious Good Challenge 2026</strong>!
                            <br>
                            <br>
                            Vivi bukan cuma jago di atas panggung, tapi juga sudah menorehkan banyak prestasi. Mulai dari <strong>Juara 1 FLS2N Nasional, Juara 1 BNN Nasional</strong>, hingga tampil di berbagai panggung nasional dan internasional, termasuk <strong>di Jepang</strong>.
                            <br>
                            <br>
                            Selain aktif sebagai performer, Vivi juga sering dipercaya menjadi juri berbagai kompetisi solo vokal dan band. Nggak berhenti di situ, ia juga mendirikan <strong>Fortuna Music</strong>, sebuah platform yang menjadi ruang bagi musisi muda untuk belajar dan berkembang.
                            <br>
                            <br>
                            Dengan pengalaman, musikalitas, dan passion yang luar biasa, Vivi siap mencari talenta-talenta terbaik yang berani tampil, berkarya, dan jadi bintang berikutnya!',
                            'image' => '/assets/images/gds-2026/kompetisi/' . $slug . '/vivi.jpeg',
                            // 'image2' => '/assets/images/gds-2026/kompetisi/' . $slug . '/vivi.jpeg',
                            // 'type' => 'SAFINA ADRIANI',
                            // 'akun_ig' => '@instagram_Juri'
                        ]
                    ],

                    'rules' => [
                        // 'file_url' => asset('rules/Rules Desain Maskot.pdf'),
                        'list' => '<div>
                                <h3 class="font-bold">JUDGING CRITERIA</h3>

                                <p class="mt-2">
                                    Di <span class="font-bold">KOLABORASA</span>, kami mencari tim yang bukan hanya jago menyanyi, tetapi juga punya chemistry, kreativitas, dan energi yang mampu menghidupkan panggung.
                                </p>

                                <ul class="mt-4 space-y-3 list-none">
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">-</span>
                                        <p class=">
                                            <span class="font-bold">Team Chemistry — 25%</span><br>
                                            Kekompakan, kerja sama, dan chemistry antar anggota tim.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">-</span>
                                        <p class=">
                                            <span class="font-bold">Song Transition Accuracy — 20%</span><br>
                                            Ketepatan menebak clue dan menyambung lagu.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">-</span>
                                        <p class=">
                                            <span class="font-bold">Performance Creativity — 20%</span><br>
                                            Konsep, ide, dan kreativitas dalam penampilan.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">-</span>
                                        <p class=">
                                            <span class="font-bold">Expression & Stage Presence — 15%</span><br>
                                            Kepercayaan diri, ekspresi, dan cara menguasai panggung.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">-</span>
                                        <p class=">
                                            <span class="font-bold">Video Quality & Format — 10%</span><br>
                                            Kualitas pengambilan gambar dan kesesuaian format.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="font-bold">-</span>
                                        <p class=">
                                            <span class="font-bold">Audio & Visual Clarity — 10%</span><br>
                                            Suara yang jelas, visual terang, dan seluruh anggota terlihat.
                                        </p>
                                    </li>
                                </ul>

                                <h3 class="mt-8 font-bold">SUBMISSION GUIDELINES</h3>

                                <p class="mt-2">
                                    Pastikan video kamu memenuhi ketentuan berikut:
                                </p>

                               <ul class="mt-4 space-y-2" style="list-style-type: disc; padding-left: 1.25rem;">
                                    <li><span class="font-bold">Vertical 9:16</span></li>
                                    <li><span class="font-bold">Cross-School Collaboration:</span> Anggota tim boleh berasal dari <span class="font-bold">sekolah yang berbeda</span>.</li>
                                    <li><span class="font-bold">MP4 | 1080 × 1920</span> <em>(min. 720p)</em></li>
                                    <li><span class="font-bold">Durasi 60–90 detik</span> <em>(maks. 250 MB)</em></li>
                                    <li>Seluruh anggota tim wajib tampil di video.</li>
                                    <li>Integrasikan <span class="font-bold">Good Day</span> secara natural.</li>
                                    <li>Sertakan <span class="font-bold">hashtag</span> dan <span class="font-bold">tag akun resmi Good Day</span>.</li>
                                    <li>Upload melalui <span class="font-bold">Microsite</span> dan <span class="font-bold">TikTok/Instagram Reels</span>.</li>
                                </ul>

                                <h4 class="mt-8 font-bold">Ready to Sing, Connect & Shine?</h4>
                            </div>'
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
