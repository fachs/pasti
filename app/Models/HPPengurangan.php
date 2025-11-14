<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HPPengurangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'koreksi_saldo',
        'belanja',
        'hibah',
        'mutasi',
        'reklasifikasi',
        'penghapusan',
        'lainnya',
        'total_pengurangan',
    ];

    public function harga_perolehans() : HasOne {
        return $this->hasOne(HargaPerolehan::class,'hp_pengurangan_id');
    }
}
