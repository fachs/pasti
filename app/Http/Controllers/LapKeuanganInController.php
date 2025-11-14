<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LapKeuanganIn;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class LapKeuanganInController extends Controller
{

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'sumber' => ['required', 'string'],
            'jumlah' => ['required', 'integer'],
            'bidang' => ['required', 'string'],
            'tanggal' => ['required', 'string'],
        ]);

        $validated = $validator->validated();

        $lapkeuanganin = LapKeuanganIn::create([
            'sumber' => $validated["sumber"],
            "jumlah" => $validated["jumlah"],
            'tanggal' => $validated["tanggal"],
            "bidang" => $validated["bidang"],
        ]);
        
        Alert::success('Berhasil', 'Pemasukan berhasil dicatat!');

        return back();
    }

    public function update(Request $request) {

        $updateProker = LapKeuanganIn::findOrFail($request->id);
        $updateProker->update($request->all());

        Alert::success('Berhasil', 'Pemasukan berhasil diubah!');

        return back();
    }
}
