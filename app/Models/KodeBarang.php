<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KodeBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'subsubrincian',
        'subrincian',
        'rincianobjek',
        'objek',
        'jenis',
        'kelompok',
    ];

    public function asets() : HasMany {
        return $this->hasMany(Aset::class, 'kode_barang_id');
    }
}
