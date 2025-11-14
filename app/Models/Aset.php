<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Aset extends Model
{
    use HasFactory;

    protected $fillable = [
        'spesifikasi',
        'spek_lainnya',
        'dokumen',
        'perolehan',
        'tgl_perolehan',
        'ukuran',
        'satuan',
        'kondisi',
        'foto',
        'harga_perolehan',
        'sumber',
        'lokasi',
        'kode_aset_id',
        'kode_barang_id',
        'harga_perolehan_id',
        'akumulasi_penyusutan_id',
    ];

    public function kode_asets() : BelongsTo {
        return $this->belongsTo(KodeAset::class, 'kode_aset_id');
    }

    public function kode_barangs() : BelongsTo {
        return $this->belongsTo(KodeBarang::class, 'kode_barang_id');
    }

    public function akumulasi_penyusutans() : BelongsTo {
        return $this->belongsTo(AkumulasiPenyusutan::class, 'akumulasi_penyusutan_id');
    }

    public function harga_perolehans() : BelongsTo {
        return $this->belongsTo(HargaPerolehan::class, 'harga_perolehan_id');
    }
}
