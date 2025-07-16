<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleryModel extends Model
{
    use HasFactory;

    protected $table = 'galery';
    protected $fillable = [
        'embed_link',
        'nama_sekolah',
        'wilayah',
        'provinsi',
        'tanggal',
        'thumbnail'
    ];

    public function getThumbnailAttribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }
}
