<?php

namespace App\Http\Controllers;

use App\Models\HPPenambahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class HPPenambahanController extends Controller
{
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'koreksi_saldo' => ['nullable', 'integer'],
            'barang_lama' => ['nullable', 'integer'],
            'belanja' => ['nullable', 'integer'],
            'hibah' => ['nullable', 'integer'],
            'mutasi' => ['nullable', 'integer'],
            'reklasifikasi' => ['nullable', 'integer'],
            'lainnya' => ['nullable', 'integer'],
            'total_penambahan' => ['required', 'total_penambahan'],
        ]);

        $validated = $validator->validated();

        $hppenambahan = HPPenambahan::create([
            'koreksi_saldo' => $validated['koreksi_saldo'],
            'barang_lama' => $validated['barang_lama'],
            'belanja' => $validated['belanja'],
            'hibah' => $validated['hibah'],
            'mutasi' => $validated['mutasi'],
            'reklasifikasi' => $validated['reklasifikasi'],
            'lainnya' => $validated['lainnya'],
            'total_penambahan' => $validated['total_penambahan'],
        ]);

        Alert::success('Berhasil', 'Penambahan berhasil dicatat!');

        return back();
    }

    public function update(Request $request) {

        $updateHppenambahan = HPPenambahan::findOrFail($request->id);
        $updateHppenambahan->update($request->all());

        Alert::success('Berhasil', 'Penambahan berhasil diubah!');

        return back();
    }
}
