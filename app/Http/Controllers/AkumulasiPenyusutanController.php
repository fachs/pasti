<?php

namespace App\Http\Controllers;

use App\Models\AkumulasiPenyusutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AkumulasiPenyusutanController extends Controller
{
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'saldo_awal' => ['required', 'integer'],
            'ap_penambahan_id' => 'required|exists:appenambahans,id',
            'ap_pengurangan_id' => 'required|exists:appengurangans,id',
            'akumpe_akhir' => ['required', 'integer'],
        ]);

        $validated = $validator->validated();

        $akumulasiPenyusutan = AkumulasiPenyusutan::create([
            'saldo_awal' => $validated['saldo_awal'],
            'ap_penambahan_id' => $validated['ap_penambahan_id'],
            'ap_pengurangan_id' => $validated['ap_pengurangan_id'],
            'akumpe_akhir' => $validated['akumpe_akhir'],
        ]);

        Alert::success('Berhasil', 'Akumulasi Penyusutan berhasil dicatat!');

        return back();
    }

    public function update(Request $request) {

        $updateAkpe = AkumulasiPenyusutan::findOrFail($request->id);
        $updateAkpe->update($request->all());

        Alert::success('Berhasil', 'Akumulasi Penyusutan berhasil diubah!');

        return back();
    }
}
