<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LapKeuanganOut extends Model
{
    use HasFactory;

    protected $fillable = [
        'penerima',
        'bidang',
        'uraian',
        'harga_satuan',
        'kuantitas',
        'total',
        'tanggal',
    ];

    public function bidang() : BelongsTo {
        return $this->belongsTo(Bidang::class);
    }
}
