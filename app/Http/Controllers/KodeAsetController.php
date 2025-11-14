<?php

namespace App\Http\Controllers;

use App\Models\KodeAset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KodeAsetController extends Controller
{

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'kode' => ['required', 'string'],
            'jenis' => ['required', 'string'],
        ]);

        $validated = $validator->validated();

        $kodeAset = KodeAset::create([
            'kode' => $validated['kode'],
            'jenis' => $validated['jenis'],
        ]);
        
        Alert::success('Berhasil', 'Kode Aset berhasil dicatat!');

        return back();
    }

    public function update(Request $request) {

        $kodeAset = KodeAset::findOrFail($request->id);

        // Update data
        $kodeAset->update([
            'kode' => $request->input('kode'),
            'jenis' => $request->input('jenis'),
        ]);

        // Response JSON ke frontend
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui',
            'data' => $kodeAset
        ]);

        // Alert::success('Berhasil', 'Kode Aset berhasil diubah!');
        // return redirect()->back();
    }

    public function getKodeAsets()
    {
        $kode_asets = DB::table('kode_asets')->get();
        return response()->json($kode_asets);
    }

    public function destroy($id)
    {
        $kodeAset = KodeAset::find($id);

        if (!$kodeAset) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $kodeAset->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
