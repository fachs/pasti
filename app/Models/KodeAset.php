<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KodeAset extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'jenis'
    ];

    public function asets() : HasMany {
        return $this->hasMany(Aset::class, 'kode_aset_id');
    }
}
