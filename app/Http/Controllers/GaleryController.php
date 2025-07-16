<?php

namespace App\Http\Controllers;

use App\Models\GaleryModel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GaleryController extends Controller
{
    public function index()
    {
        $galeries = GaleryModel::select([
            'id',
            'embed_link',
            'nama_sekolah',
            'wilayah',
            'provinsi',
            'tanggal',
            'thumbnail',
        ])->orderByDesc('tanggal')->get();

        return Inertia::render('Galery', [
            'galeries' => $galeries,
        ]);
    }

}
