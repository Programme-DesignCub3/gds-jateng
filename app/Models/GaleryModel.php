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
        'title',
        'subtitle',
        'tanggal',
        'lokasi',
        'thumbnail'
    ];

    public function getThumbnailUrlAttribute(): ?string
    {
        return $this->thumbnail ? asset('storage/' . $this->thumbnail) : null;
    }
}
