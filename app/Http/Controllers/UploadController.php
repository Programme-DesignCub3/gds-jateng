<?php

namespace App\Http\Controllers;

use App\Enums\CompetitionList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Inertia\Inertia;

class UploadController extends Controller
{
    public function create() {}

    public function store(Request $request)
    {
        // Batasi 1 submission per user (kalau memang aturannya begitu)
        if (Auth::user()->submission) {
            return redirect()->back();
        }

        // Pastikan user login punya cast enum di model User:
        // protected $casts = ['competition' => CompetitionList::class];

        $filename = auth()->id().'_'.$request->competition.'_'.$request->judulSubmission.'_'.Carbon::now()->timestamp;

        // VALIDASI (video + thumbnail untuk semua kompetisi yang ada saat ini)
        $request->validate([
            'file' => [
                'required',
                File::types(['mp4', 'mov', 'mkv'])->max('250mb'),
            ],
            'thumbnail' => [
                'required',
                File::image()->max('3mb'),
            ],
            'judulSubmission' => ['required', 'string', 'max:255'],
            'linkIg' => ['required', 'string'], // kalau mau ketat: 'url'
            'competition' => [Rule::enum(CompetitionList::class)],
            'submissionDescription' => ['required', 'string'],
        ]);

        // Opsi keamanan: pastikan kompetisi yang dikirim form == kompetisi user terdaftar
        if ($request->user()->competition instanceof CompetitionList) {
            if ($request->user()->competition->value !== $request->competition) {
                return back()->withErrors(['competition' => 'Kompetisi tidak sesuai dengan akun Anda.']);
            }
        } else {
            // Jika belum di-cast enum, bandingkan string langsung:
            if ($request->user()->competition !== $request->competition) {
                return back()->withErrors(['competition' => 'Kompetisi tidak sesuai dengan akun Anda.']);
            }
        }

        // SIMPAN FILE
        if ($request->hasFile('file') && $request->hasFile('thumbnail')) {
            $video = $request->file('file');
            $thumb = $request->file('thumbnail');

            if ($video->isValid() && $thumb->isValid()) {
                $paths = [];

                $videoPath = $video->storeAs(
                    'submission/'.auth()->id(),
                    $filename.'.'.$video->extension(),
                    'public'
                );
                $paths[] = $videoPath;

                $thumbPath = $thumb->storeAs(
                    'submission/'.auth()->id(),
                    $filename.'_thumb.'.$thumb->extension(),
                    'public'
                );

                $request->user()->submission()->create([
                    'user_id'           => $request->user()->id,
                    'files_path'        => $paths,              // pastikan kolomnya JSON
                    'thumbnail_path'    => $thumbPath,
                    'submission_name'   => $request->judulSubmission,
                    'submission_type'   => $request->competition,
                    'submission_desc'   => $request->submissionDescription,
                    'ig_reel'           => $request->linkIg,
                ]);

                return Inertia::render('SubmissionDone');
            }

            return back()->withErrors(['file' => 'File tidak valid.']);
        }

        return back()->withErrors(['file' => 'File dan thumbnail wajib diunggah.']);
    }
}
