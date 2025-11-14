<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKerja;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class ProgramKerjaController extends Controller
{
    // public function show($id)
    // {
    //     $bidang = \Auth::user()->bidang;
    //     $prokers = DB::table('program_kerjas')->where('id', $id)->select('nama','progress','tanggal_pelaksanaan', 'deskripsi', 'pic_1','nama_bidang')->get();

    //     return view('pages/proker-detail')->with('prokers', $prokers);
    // }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string'],
            'nama_bidang' => ['required', 'string'],
            'progress' => ['nullable','integer'],
            'tanggal_pelaksanaan' => ['required', 'string'],
            'pic_1' => ['required', 'string'],
        ]);

        $validated = $validator->validated();

        $proker = ProgramKerja::create([
            'nama' => $validated["nama"],
            "nama_bidang" => $validated["nama_bidang"],
            'progress' => $validated["progress"],
            "tanggal_pelaksanaan" => $validated["tanggal_pelaksanaan"],
            'pic_1' => $validated["pic_1"],
        ]);

        Alert::success('Berhasil', 'Program kerja berhasil ditambahkan!');

        return back();
    }

    public function update(Request $request) {

        $updateProker = ProgramKerja::findOrFail($request->id);
        $updateProker->update($request->all());

        Alert::success('Berhasil', 'Perubahan berhasil disimpan!');

        return back();
    }

}
