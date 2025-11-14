<?php

namespace App\Http\Controllers;

use App\Models\HargaPerolehan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class HargaPerolehanController extends Controller
{
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'saldo_awal' => ['required', 'integer'],
            'hp_penambahan_id' => 'required|exists:hppenambahans,id',
            'hp_pengurangan_id' => 'required|exists:hppengurangans,id',
            'haper_akhir' => ['required', 'integer'],
        ]);

        $validated = $validator->validated();

        $hargaPerolehan = HargaPerolehan::create([
            'saldo_awal' => $validated['saldo_awal'],
            'hp_penambahan_id' => $validated['hp_penambahan_id'],
            'hp_pengurangan_id' => $validated['hp_pengurangan_id'],
            'haper_akhir' => $validated['akumpe_akhir'],
        ]);

        Alert::success('Berhasil', 'Harga Perolehan berhasil dicatat!');

        return back();
    }

    public function update(Request $request) {

        $updateHaper = HargaPerolehan::findOrFail($request->id);
        $updateHaper->update($request->all());

        Alert::success('Berhasil', 'Harga Perolehan berhasil diubah!');

        return back();
    }
}
