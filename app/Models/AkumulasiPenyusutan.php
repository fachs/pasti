<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AkumulasiPenyusutan extends Model
{
    use HasFactory;

    protected $fillable = [
        'saldo_awal',
        'ap_penambahan_id',
        'ap_pengurangan_id',
        'akumpe_akhir',
    ];

    public function asets() : HasOne {
        return $this->hasOne(Aset::class, 'akumulasi_penyusutan_id');
    }

    public function appenambahans() : BelongsTo {
        return $this->belongsTo(HPPenambahan::class, 'ap_penambahan_id');
    }

    public function appengurangans() : BelongsTo {
        return $this->belongsTo(HPPengurangan::class, 'ap_pengurangan_id');
    }
}
