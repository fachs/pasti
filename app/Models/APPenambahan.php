<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class APPenambahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'koreksi_saldo',
        'barang_lama',
        'belanja',
        'hibah',
        'mutasi',
        'reklasifikasi',
        'lainnya',
        'total_penambahan',
    ];

    public function akumulasi_penyusutans() : HasOne {
        return $this->hasOne(AkumulasiPenyusutan::class,'ap_penambahan_id');
    }
}
