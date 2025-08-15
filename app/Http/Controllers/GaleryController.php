<?php

namespace App\Http\Controllers;

use App\Models\GaleryModel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GaleryController extends Controller
{
    public function index()
    {
        $galeries = GaleryModel::orderByDesc('tanggal')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'embed_link' => $item->embed_link,
                'title' => $item->title,
                'subtitle' => $item->subtitle,
                'tanggal' => $item->tanggal,
                'thumbnail' => $item->thumbnail_url, 
                'lokasi' => $item->lokasi,
            ];
        });

        return Inertia::render('Galery', [
            'galeries' => $galeries,
        ]);
    }

}
