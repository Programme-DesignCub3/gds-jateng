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
                'shortDesc' => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.",
                'route' => "modern-dance-competition",
                'image' => "/assets/images/gds-2026/kompetisi/logo-modern-dance.png",
            ],
            [
                'title' => "Chant Supporter Competition",
                'shortDesc' => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.",
                'route' => "chant-supporter-competition",
                'image' => "/assets/images/gds-2026/kompetisi/logo-chant-supporter.png",
            ],
            [
                'title' => "Vlog Competition",
                'shortDesc' => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.",
                'route' => "vlog-competition",
                'image' => "/assets/images/gds-2026/kompetisi/logo-vlog.png",
            ],
            [
                'title' => 'Kolaborasa',
                'shortDesc' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.',
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
                    'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.<br> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.',

                    'prize' => [
                        'imageUrl' => '/assets/images/gds-2026/kompetisi/' . $slug . '/prize.png',
                        'desc' => '<strong class="text-xl"> Total Jutaan Rupiah untuk para pemenang Modern Dance Supporter Competition </strong> <br>
                                <br>
                                 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat.'
                    ],

                    'jury' => [
                        [
                            'name' => 'SAFINA & FIFI',
                            'desc' => ' Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.',
                            'image' => '/assets/images/gds-2026/kompetisi/' . $slug . '/safina.jpeg',
                            'image2' => '/assets/images/gds-2026/kompetisi/' . $slug . '/vivi.jpeg',
                            // 'type' => 'SAFINA ADRIANI',
                            // 'akun_ig' => '@instagram_Juri'
                        ]
                    ],

                    'rules' => [
                        // 'file_url' => asset('rules/Rules Desain Maskot.pdf'),
                        'list' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.<br> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.'
                    ]
                ];
                break;
            case 'chant-supporter-competition':
                $data = [
                    'title' => 'Chant Supporter Competition ',
                    'slug' => 'chant-supporter-competition',
                    'logoURL' => '/assets/images/gds-2026/kompetisi/' . $slug . '/logo.png',
                    'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.<br> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.',

                    'prize' => [
                        'imageUrl' => '/assets/images/gds-2026/kompetisi/' . $slug . '/prize.png',
                        'desc' => '<strong class="text-xl"> Total Jutaan Rupiah untuk para pemenang Chant Supporter Competition </strong> <br>
                                <br>
                                 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat.'
                    ],

                    'jury' => [
                        [
                            'name' => 'SAFINA & FIFI',
                            'desc' => ' Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.',
                            'image' => '/assets/images/gds-2026/kompetisi/' . $slug . '/safina.jpeg',
                            'image2' => '/assets/images/gds-2026/kompetisi/' . $slug . '/vivi.jpeg',
                            // 'type' => 'SAFINA ADRIANI',
                            // 'akun_ig' => '@instagram_Juri'
                        ]
                    ],

                    'rules' => [
                        // 'file_url' => asset('rules/Rules Desain Maskot.pdf'),
                        'list' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.<br> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.'
                    ]
                ];
                break;
            case 'vlog-competition':
                $data = [
                    'title' => 'Vlog Competition',
                    'slug' => 'vlog-competition',
                    'logoURL' => '/assets/images/gds-2026/kompetisi/' . $slug . '/logo.png',
                    'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.<br> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.',

                    'prize' => [
                        'imageUrl' => '/assets/images/gds-2026/kompetisi/' . $slug . '/prize.png',
                        'desc' => '<strong class="text-xl"> Total Jutaan Rupiah untuk para pemenang Vlog Competition </strong> <br>
                                <br>
                                 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat.'
                    ],

                    'jury' => [
                        [
                            'name' => 'SAFINA & FIFI',
                            'desc' => ' Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.',
                            'image' => '/assets/images/gds-2026/kompetisi/' . $slug . '/safina.jpeg',
                            'image2' => '/assets/images/gds-2026/kompetisi/' . $slug . '/vivi.jpeg',
                            // 'type' => 'SAFINA ADRIANI',
                            // 'akun_ig' => '@instagram_Juri'
                        ]
                    ],

                    'rules' => [
                        // 'file_url' => asset('rules/Rules Desain Maskot.pdf'),
                        'list' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.<br> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.'
                    ]
                ];
                break;
            case 'kolaborasa':
                $data = [
                    'title' => 'Kolaborasa ',
                    'slug' => 'kolaborasa',
                    'logoURL' => '/assets/images/gds-2026/kompetisi/' . $slug . '/logo.png',
                    'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.<br> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.',

                    'prize' => [
                        'imageUrl' => '/assets/images/gds-2026/kompetisi/' . $slug . '/prize.png',
                        'desc' => '<strong class="text-xl"> Total Jutaan Rupiah untuk para pemenang Kolaborasa </strong> <br>
                                <br>
                                 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat.'
                    ],

                    'jury' => [
                        [
                            'name' => 'SAFINA & FIFI',
                            'desc' => ' Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.',
                            'image' => '/assets/images/gds-2026/kompetisi/' . $slug . '/safina.jpeg',
                            'image2' => '/assets/images/gds-2026/kompetisi/' . $slug . '/vivi.jpeg',
                            // 'type' => 'SAFINA ADRIANI',
                            // 'akun_ig' => '@instagram_Juri'
                        ]
                    ],

                    'rules' => [
                        // 'file_url' => asset('rules/Rules Desain Maskot.pdf'),
                        'list' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.<br> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.'
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
