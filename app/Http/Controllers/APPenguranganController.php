<?php

namespace App\Http\Controllers;

use App\Models\APPengurangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class APPenguranganController extends Controller
{
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'koreksi_saldo' => ['nullable', 'integer'],
            'hibah' => ['nullable', 'integer'],
            'mutasi' => ['nullable', 'integer'],
            'penghapusan' => ['nullable', 'integer'],
            'reklasifikasi' => ['nullable', 'integer'],
            'lainnya' => ['nullable', 'integer'],
            'total_pengurangan' => ['required', 'total_pengurangan'],
        ]);

        $validated = $validator->validated();

        $appengurangan = APPengurangan::create([
            'koreksi_saldo' => $validated['koreksi_saldo'],
            'hibah' => $validated['hibah'],
            'mutasi' => $validated['mutasi'],
            'penghapusan' => $validated['penghapusan'],
            'reklasifikasi' => $validated['reklasifikasi'],
            'lainnya' => $validated['lainnya'],
            'total_pengurangan' => $validated['total_pengurangan'],
        ]);

        Alert::success('Berhasil', 'Pengurangan berhasil dicatat!');

        return back();
    }

    public function update(Request $request) {

        $updateAppengurangan = APPengurangan::findOrFail($request->id);
        $updateAppengurangan->update($request->all());

        Alert::success('Berhasil', 'Pengurangan berhasil diubah!');

        return back();
    }
}
