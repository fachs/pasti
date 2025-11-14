<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HargaPerolehan extends Model
{
    use HasFactory;

    protected $fillable = [
        'saldo_awal',
        'hp_penambahan_id',
        'hp_pengurangan_id',
        'haper_akhir',
    ];

    public function asets() : HasOne {
        return $this->hasOne(Aset::class,'harga_perolehan_id');
    }

    public function hppenambahans() : BelongsTo {
        return $this->belongsTo(HPPenambahan::class, 'hp_penambahan_id');
    }

    public function hppengurangans() : BelongsTo {
        return $this->belongsTo(HPPengurangan::class, 'hp_pengurangan_id');
    }
}
