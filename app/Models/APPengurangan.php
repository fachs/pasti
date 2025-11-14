<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class APPengurangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'koreksi_saldo',
        'hibah',
        'mutasi',
        'penghapusan',
        'reklasifikasi',
        'lainnya',
        'total_pengurangan',
    ];

    public function akumulasi_penyusutans() : HasOne {
        return $this->hasOne(AkumulasiPenyusutan::class,'ap_pengurangan_id');
    }
}
