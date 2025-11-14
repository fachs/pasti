<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\KodeAset;
use App\Models\KodeBarang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AsetController extends Controller
{
    public function show($id)
    {
        $asets = Aset::findOrFail($id);
        return view('pages/aset-detail')->with('asets', $asets);
    }

    public function edit($id)
    {
        $asets = Aset::findOrFail($id);
        $kode_asets = KodeAset::all(); 
        $kode_barangs = KodeBarang::all(); 

        return view('pages/aset-edit', compact(['asets', 'kode_asets','kode_barangs']));
    }

    public function store(Request $request) {

         $this->validate($request, [
            'spesifikasi' => ['required', 'string'],
            'spek_lainnya' => ['nullable', 'string'],
            'dokumen' => 'mimes:pdf|max:5048',
            'perolehan' => ['required', 'string'],
            'tgl_perolehan' => 'required',
            'ukuran' => ['nullable', 'integer'],
            'satuan' => ['required', 'string'],
            'kondisi' => ['required', 'string'],
            'foto' => 'mimes:jpg,jpeg,png|max:5048',
            'sumber' => ['nullable', 'string'],
            'lokasi' => ['nullable', 'string'],
            'harga_perolehan' => ['nullable', 'integer'],
            'kode_aset_id' => 'required|exists:kode_asets,id',
            'kode_barang_id' => 'required|exists:kode_barangs,id',
            'harga_perolehan_id' => 'nullable|exists:harga_perolehans,id',
            'akumulasi_penyusutan_id' => 'nullable|exists:akumulasi_penyusutans,id'
        ]);

        $file_aset = $request->file('dokumen');
        $foto_aset = $request->file('foto');
        
        $nama_file = $file_aset->getClientOriginalName();
        $nama_foto = $foto_aset->getClientOriginalName();

        $file_aset->move('public/dokumen-aset', $file_aset->getClientOriginalName());
        $foto_aset->move('public/foto-aset', $foto_aset->getClientOriginalName());

        $req_aset = new Aset;
        $req_aset->dokumen = $nama_file;
        $req_aset->foto = $nama_foto;
        $req_aset->spesifikasi = $request->input('spesifikasi');
        $req_aset->spek_lainnya = $request->input('spek_lainnya');
        $req_aset->perolehan = $request->input('perolehan');
        $req_aset->tgl_perolehan = $request->input('tgl_perolehan');
        $req_aset->ukuran = $request->input('ukuran');
        $req_aset->satuan = $request->input('satuan');
        $req_aset->kondisi = $request->input('kondisi');
        $req_aset->lokasi = $request->input('lokasi');
        $req_aset->harga_perolehan = $request->input('harga_perolehan');
        $req_aset->sumber = $request->input('sumber');
        $req_aset->kode_aset_id = $request->input('kode_aset_id');
        $req_aset->kode_barang_id = $request->input('kode_barang_id');
        $req_aset->harga_perolehan_id = $request->input('harga_perolehan_id');
        $req_aset->akumulasi_penyusutan_id = $request->input('akumulasi_penyusutan_id');
        $req_aset->save();
        
        Alert::success('Berhasil', 'Aset berhasil dicatat!');

        return back();
    }

    public function update(Request $request) {

        $updateAset = Aset::findOrFail($request->id);

        $pathDokumen = public_path().'/dokumen-aset';
        $pathFoto = public_path().'/foto-aset';
  
            // === HANDLE FILE DOKUMEN ===
            if($request->hasFile('dokumen')){
                 $file_old = $pathDokumen.$updateAset->dokumen;
                 unlink($file_old);

                //upload new file
                $file = $request->file('dokumen');
                $filename = $file->getClientOriginalName();
                $file->move($pathDokumen, $filename);
                $updateAset->dokumen = $filename;
            }

            // === HANDLE FILE FOTO ===
            if($request->hasFile('foto')){
                 $file_old = $pathFoto.$updateAset->dokumen;
                 unlink($file_old);

                //upload new file
                $file = $request->file('foto');
                $filename = $file->getClientOriginalName();
                $file->move($pathFoto, $filename);
                $updateAset->foto = $filename;
            }


        // $updateAset->update($request->all());
        $updateAset->fill($request->except(['dokumen', 'foto']));
        $updateAset->save();

        Alert::success('Berhasil', 'Aset berhasil diubah!');

        return back();
    }

    public function getAsets()
    {
        $asets = Aset::with(['kode_barangs', 'kode_asets', 'akumulasi_penyusutans', 'harga_perolehans'])->get();
        return response()->json($asets);
    }

    public function destroy($id)
    {
        $aset = Aset::find($id);

        if (!$aset) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $aset->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
