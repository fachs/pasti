<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UploadDokumenController extends Controller
{

    public function store(Request $request) {

        $path = $request->file('dokumen')->store('temp', 'public');
        return response()->json(['path' => $path]);
        
        Alert::success('Berhasil', 'Aset berhasil dicatat!');

        return back();
    }

    public function update(Request $request) {

        $updateAset = Aset::findOrFail($request->id);
        $updateAset->update($request->all());

        Alert::success('Berhasil', 'Aset berhasil diubah!');

        return back();
    }

    public function getAsets()
    {
        $asets = DB::table('asets')->get();
        return response()->json($asets);
    }
}
