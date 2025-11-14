<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LapKeuanganOut;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LapKeuanganOutController extends Controller
{
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'penerima' => ['required', 'string'],
            'uraian' => ['required', 'string'],
            'bidang' => ['required', 'string'],
            'harga_satuan' => ['required', 'integer'],
            'kuantitas' => ['required', 'integer'],
            'total' => ['required', 'integer'],
            'tanggal' => ['required', 'string'],
        ]);

        $validated = $validator->validated();

        $lapkeuanganout = LapKeuanganOut::create([
            'penerima' => $validated["penerima"],
            "uraian" => $validated["uraian"],
            "bidang" => $validated["bidang"],
            'harga_satuan' => $validated["harga_satuan"],
            'kuantitas' => $validated["kuantitas"],
            "total" => $validated["total"],
            'tanggal' => $validated["tanggal"],
        ]);

        Alert::success('Berhasil', 'Pengeluaran berhasil dicatat!');

        return redirect()->route('keuangan/laporan');
    }

    public function update(Request $request) {

        $updateProker = LapKeuanganOut::findOrFail($request->id);
        $updateProker->update($request->all());

        Alert::success('Berhasil', 'Pengeluaran berhasil diubah!');

        return back();
    }
}
