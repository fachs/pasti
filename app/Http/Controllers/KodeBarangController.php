<?php

namespace App\Http\Controllers;

use App\Models\KodeBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KodeBarangController extends Controller
{

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'kode' => ['required', 'string'],
            'subsubrincian' => ['required', 'string'],
            'subrincian' => ['required', 'string'],
            'rincianobjek' => ['required', 'string'],
            'objek' => ['required', 'string'],
            'jenis' => ['required', 'string'],
            'kelompok' => ['required', 'string'],
        ]);

        $validated = $validator->validated();

        $kodeBarang = KodeBarang::create([
            'kode' => $validated['kode'],
            'subsubrincian' => $validated['subsubrincian'],
            'subrincian' => $validated['subrincian'],
            'rincianobjek' => $validated['rincianobjek'],
            'objek' => $validated['objek'],
            'jenis' => $validated['jenis'],
            'kelompok' => $validated['kelompok'],
        ]);
        
        Alert::success('Berhasil', 'Kode Barang berhasil dicatat!');

        return back();
    }

    public function update(Request $request) {

        $updateKodeBarang = KodeBarang::findOrFail($request->id);
        $updateKodeBarang->update($request->all());

        Alert::success('Berhasil', 'Kode Barang berhasil diubah!');

        return back();
    }

    public function getKodeBarangs()
    {
        $kode_barangs = DB::table('kode_barangs')->get();
        return response()->json($kode_barangs);
    }

    public function destroy($id)
    {
        $kodeBarang = KodeBarang::find($id);

        if (!$kodeBarang) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $kodeBarang->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
