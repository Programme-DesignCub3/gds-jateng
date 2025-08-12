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
                'title' => "Moderrn Dance Competition",
                'shortDesc' => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.",
                'route' => "modern-dance-competition",
                'image' => "/assets/images/competition/overall/dance.png",
            ],
            [
                'title' => "Chant Supporter Competition",
                'shortDesc' => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. ",
                'route' => "chant-supporter-competition",
                'image' => "/assets/images/competition/overall/chant.png",
            ],
            [
                'title' => 'Kolaborasa',
                'shortDesc' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.',
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
                    'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                    <br/> Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.',

                    'prize' => [
                        'imageUrl' => '/assets/images/competition/' . $slug . '/prize.png',
                        'desc' => '<strong class="text-xl"> Total Jutaan Rupiah untuk para pemenang Modern Dance Competition </strong> <br> <br> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. '
                    ],

                    'jury' => [
                        [
                            'name' => 'Juri',
                            'desc' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. ',
                            'image' => '/assets/images/competition/' . $slug . '/people.png',
                            'type' => 'Nama Juri',
                            'akun_ig' => '@instagram_Juri'
                        ]
                    ],


                    'rules' => [
                        // 'file_url' => asset('rules/Rules Desain Maskot.pdf'),
                        'list' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. <br> Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.'
                    ]
                ];
                break;
            case 'chant-supporter-competition':
                $data = [
                    'title' => 'Chant Supporter Competition ',
                    'slug' => 'chant-supporter-competition',
                    'logoURL' => '/assets/images/competition/' . $slug . '/logo.png',
                    'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                    <br/> Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.',
                    'prize' => [
                        'imageUrl' => '/assets/images/competition/' . $slug . '/prize.png',
                        'desc' => '<strong class="text-xl"> Total Jutaan Rupiah untuk para pemenang Chant Supporter Competition </strong> <br> <br> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. '
                    ],
                    'jury' => [
                        [
                            'name' => 'Juri',
                            'desc' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. ',
                            'type' => 'Nama Juri',
                            'image' => '/assets/images/competition/' . $slug . '/sufendi.png',
                            'akun_ig' => '@instagram_Juri'
                        ]
                    ],
                    'rules' => [
                        // 'file_url' => asset('rules/Rules Chant Supporter.pdf'),
                        'list' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. <br> Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.'
                    ]

                ];
                break;
            case 'kolaborasa':
                $data = [
                    'title' => 'Kolaborasa ',
                    'slug' => 'kolaborasa',
                    'logoURL' => '/assets/images/competition/' . $slug . '/logo.png',
                    'description' => '
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                    <br/> Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                    ',
                    'prize' => [
                        'imageUrl' => '/assets/images/competition/' . $slug . '/prize.png',
                        'desc' => '<strong class="text-xl"> Total Jutaan Rupiah untuk para pemenang Kolaborasa </strong> <br> <br> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. '
                    ],
                    'jury' => [
                        [
                            'name' => 'Juri',
                            'desc' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. ',
                            'type' => 'Nama Juri',
                            'image' => '/assets/images/competition/' . $slug . '/Juri.jpg',
                            'akun_ig' => '@instagram_Juri'
                        ]
                    ],
                    'rules' => [
                        // 'file_url' => asset('rules/Rules Kolaborasa.pdf'),
                        'list' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. <br> Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.'
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
