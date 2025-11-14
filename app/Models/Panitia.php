<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Panitia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'no_whatsapp',
        'prodi',
        'alasan',
        'kepanitiaan_id',
        'nama_proker',
    ];
    
    public function kepanitiaan() : BelongsTo {
        return $this->belongsTo(Kepanitiaan::class);
    }
}
