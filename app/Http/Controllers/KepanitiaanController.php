<?php

namespace App\Http\Controllers;
use App\Models\Kepanitiaan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KepanitiaanController extends Controller
{
    public function show($id) {

        $bidang = \Auth::user()->bidang;

        $prokers = DB::table('program_kerjas')->where('id',$id)->select('id','nama')->get();
        $kepanitiaans = DB::table('kepanitiaans')->where('bidang',$bidang)->select('id','nama_proker','divisi','pelaksanaan','jobdesc')->get();
        $panitias = DB::table('panitias')->select('id','nama','nim','no_whatsapp', 'prodi', 'alasan','kepanitiaan_id')->paginate(10);

        return view('pages/kepanitiaan')->with('kepanitiaans', $kepanitiaans)->with('panitias', $panitias)->with('prokers', $prokers);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'proker_id' => ['required', 'integer'],
            'nama_proker' => ['required', 'string'],
            'bidang' => ['required', 'string'],
            'divisi' => ['required', 'string'],
            'pelaksanaan' => ['required','string'],
            'jobdesc' => ['required', 'string'],
        ]);

        $validated = $validator->validated();

        $kepanitiaan = Kepanitiaan::create([
            'proker_id' => $validated["proker_id"],
            'nama_proker' => $validated["nama_proker"],
            "divisi" => $validated["divisi"],
            "bidang" => $validated["bidang"],
            'pelaksanaan' => $validated["pelaksanaan"],
            "jobdesc" => $validated["jobdesc"],
        ]);

        Alert::success('Berhasil', 'Kepanitiaan berhasil ditambahkan!');

        return back();
    }

    public function update(Request $request) {

        $updateProker = Kepanitiaan::findOrFail($request->id);
        $updateProker->update($request->all());

        return back();
    }
    
}
