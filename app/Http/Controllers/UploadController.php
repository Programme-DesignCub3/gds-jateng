<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\ContentRangeUploadHandler;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use RahulHaque\Filepond\Facades\Filepond;

class UploadController extends Controller
{
    /**
     * Handles the file upload
     *
     * @param Request $request
     *
     * @return JsonResponse
     *
     * @throws UploadMissingFileException
     * @throws UploadFailedException
     */
    public function upload(Request $request)
    {
        $receiver = new FileReceiver(
            UploadedFile::fake()->createWithContent('file', $request->getContent()),
            $request,
            HandlerFactory::classFromRequest($request)
            // ContentRangeUploadHandler::class
        );
        // check if the upload is success, throw exception or return response you need
        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }

        // receive the file
        $save = $receiver->receive();

        // check if the upload has finished (in chunk mode it will send smaller files)
        if ($save->isFinished()) {
            // save the file and return any response you need, current example uses `move` function. If you are
            // not using move, you need to manually delete the file by unlink($save->getFile()->getPathname())
            return $this->saveFile($request, $save->getFile());
            // $this->storeFile($request, $save->getFile());
        }

        // we are in chunk mode, lets send the current progress
        /** @var AbstractHandler $handler */
        $handler = $save->handler();

        return response()->json([
            "done" => $handler->getPercentageDone(),
            'status' => true
        ]);
    }

    /**
     * Handles the file upload with filepond
     *
     * @param Request $request
     *
     * @return JsonResponse
     *
     * @throws UploadMissingFileException
     * @throws UploadFailedException
     */
    public function uploadFilepond(Request $request)
    {
        // Single and multiple file validation

        // dd($request);

        $this->validate($request, [
            // 'user_id' => 'required|number',
            'video' => Rule::filepond([
                'required',
                // 'video',
            ]),
            'thumbnail' => Rule::filepond([
                'required',
                'image',
            ]),
            // 'submission_type' => 'required|string|max:255',
            'judulVideo' => 'required|string|max:255',
            'linkIg' => 'required|string|max:255',
            'videoDescription' => 'required',

        ]);

        // Set filename
        $videoName = 'video' . auth()->id();


        // Move the file to permanent storage
        // Automatic file extension set
        $fileInfo = Filepond::field($request->videoId)
            ->moveTo('videoFile/' . $videoName);

        // dd($fileInfo);
        // [
        //     "id" => 1,
        //     "dirname" => "avatars",
        //     "basename" => "avatar-1.png",
        //     "extension" => "png",
        //     "filename" => "avatar-1",
        //     "location" => "avatars/avatar-1.png",
        //     "url" => "http://localhost/storage/avatars/avatar-1.png",
        // ];

        $thumbnailName = 'thumbnail-' . auth()->id();

        $fileInfos = Filepond::field($request->thumbnail)
            ->moveTo('thumbnail/' . $thumbnailName);

        // dd($fileInfos);
        // [
        //     [
        //         "id" => 1,
        //         "dirname" => "galleries",
        //         "basename" => "gallery-1-1.png",
        //         "extension" => "png",
        //         "filename" => "gallery-1-1",
        //         "location" => "galleries/gallery-1-1.png",
        //         "url" => "http://localhost/storage/galleries/gallery-1-1.png",
        //     ],
        //     [
        //         "id" => 2,
        //         "dirname" => "galleries",
        //         "basename" => "gallery-1-2.png",
        //         "extension" => "png",
        //         "filename" => "gallery-1-2",
        //         "location" => "galleries/gallery-1-2.png",
        //         "url" => "http://localhost/storage/galleries/gallery-1-2.png",
        //     ],
        //     [
        //         "id" => 3,
        //         "dirname" => "galleries",
        //         "basename" => "gallery-1-3.png",
        //         "extension" => "png",
        //         "filename" => "gallery-1-3",
        //         "location" => "galleries/gallery-1-3.png",
        //         "url" => "http://localhost/storage/galleries/gallery-1-3.png",
        //     ],
        // ]


        auth()->user()->submission()->create([
            'user_id' => $request->user()->id,
            'file_path' => $fileInfos['location'],
            'submission_type' => 'test sub type',
            'submission_name' => $request->judulVideo,
            'submission_desc' => $request->videoDescription,
            // 'submission_name'=> $request->header('video_title'),
        ]);

        // Do your chores and done
        session()->flash('flash', [
            'bannerStyle' => 'success',
            // 'banner' => 'Profile information updated successfully!',
        ]);

        return redirect()->back();
    }

    /**
     * Handles the file upload with inertia form
     *
     * @param Request $request
     *
     * @return JsonResponse
     *
     * @throws UploadMissingFileException
     * @throws UploadFailedException
     */
    public function uploadInertia(Request $request)
    {
        if ($request->hasfile('file')) {

            $video_file = $request->file('file');
            $thumbnail = $request->file('thumbnail');
            $video_extension = $request->file('file')->extension();
            $thumbnail_extension = $request->file('thumbnail')->extension();
            if ($video_file->isValid() && $thumbnail->isValid()) {

                // dd(Auth::user()->id());
                // NAME FORMAT : namasekolah - typesubmission - timestamp
                $filename = Auth::user()->id . ' - ' . $request->competition . ' - ' .
                    Carbon::now()->timestamp;
                $video_file_path = $video_file->storeAs('testUpload/' . Auth::user()->id, $filename . '.' . $video_extension);
                $thumbnail->storeAs('testUpload/' . Auth::user()->id, $filename . '_thumb.' . $thumbnail_extension);

                $request->user()->submission()->create([
                    'user_id' => $request->user()->id,
                    'file_path' => $video_file_path,
                    'submission_name' => $request->judulVideo,
                    'submission_type' => $request->competition,
                    'submission_desc' => $request->videoDescription,

                ]);
            }
            return Inertia::render('SubmissionSuccess');
        } else {
            echo 'Gagal';
        }

        return Inertia::render('Upload');
    }



    protected function storeFile(Request $request, UploadedFile $file)
    {
        $request->user()->submission()->create([
            'file_path' => $file->storeAs('videos', Str::uuid(), 'public')
        ]);
    }

    protected function saveFile(Request $request, UploadedFile $file)
    {
        $fileName = $this->createFilename($file);
        // Group files by mime type
        $mime = str_replace('/', '-', $file->getMimeType());
        // Group files by the date (week
        $dateFolder = date("Y-m-W");

        // Build the file path
        // $filePath = "upload/user/{$dateFolder}/";
        $finalPath = storage_path("app/" . 'testUpload');

        // move the file name
        // $file->storeAs('testUpload', Str::uuid(), 'public');
        // $file->store('test');

        $file->move($finalPath, $fileName);

        $request->user()->submission()->create([
            'user_id' => Auth::id(),
            'file_path' => '/testUpload/' . $fileName,
            'submission_type' => 'test sub type',
            'submission_name' => $request->header('video-title'),
            'submission_desc' => $request->header('video-desc'),
            // 'submission_name'=> $request->header('video_title'),
        ]);

        // return response()->json([
        //     'path' => $filePath,
        //     'name' => $fileName,
        //     'mime_type' => $mime
        // ]);
    }

    /**
     * Create unique filename for uploaded file
     * @param UploadedFile $file
     * @return string
     */
    protected function createFilename(UploadedFile $file)
    {

        $extension = $file->getClientOriginalExtension();

        if (!$extension) {
            $extension = 'mp4';
        }
        $filename = str_replace("." . $extension, "", $file->getClientOriginalName()); // Filename without extension

        // Add timestamp hash to name of the file
        $filename .= "_" . md5(time()) . "." . $extension;

        return $filename;
    }
}
