<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Desain extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'status',
        'jenis',
        'pic_kontak',
        'pic_name',
        'pic_bidang',
        'keterangan_slide',
        'deskripsi',
        'lampiran',
        'hasil_desain'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
