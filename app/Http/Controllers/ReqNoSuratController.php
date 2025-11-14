<?php

namespace App\Http\Controllers;
use App\Models\ReqNoSurat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\File;
use RealRashid\SweetAlert\Facades\Alert;

class ReqNoSuratController extends Controller
{
    public function show()
    {

        $bidang = \Auth::user()->bidang;

        if ($bidang == 'Sekretariat') {
            $req_surats = DB::table('req_no_surats')->select('id','status','pic_name','pic_kontak','file_surat', 'hasil_no_surat', 'created_at')->paginate(10);

            return view('pages/persuratan-nosurat')->with('req_surats', $req_surats);
        } else {
            $req_surats = DB::table('req_no_surats')->where('bidang',$bidang)->select('id','status','pic_name','pic_kontak','file_surat', 'hasil_no_surat', 'created_at')->paginate(10);

            return view('pages/persuratan-nosurat-admin')->with('req_surats', $req_surats);
        }
        
    }

    public function upload(Request $request) {
        
        // return $request->file('file_surat')->store('public');
        $this->validate($request, [
            'file_surat' => 'required|mimes:pdf|max:5048',
            'status' => 'required',
            'hasil_no_surat' => 'required',
            'bidang' => 'required',
            'pic_kontak' => 'required',
            'pic_name' => 'required',
        ]);

        $file_surat = $request->file('file_surat');
        
        $nama_file = $file_surat->getClientOriginalName();

        $file_surat->move('public/file-surat', $file_surat->getClientOriginalName());

        $req_no_surat = new ReqNoSurat;
        $req_no_surat->file_surat = $nama_file;
        $req_no_surat->status = $request->input('status');
        $req_no_surat->bidang = $request->input('bidang');
        $req_no_surat->hasil_no_surat = $request->input('hasil_no_surat');
        $req_no_surat->pic_kontak = $request->input('pic_kontak');
        $req_no_surat->pic_name = $request->input('pic_name');

        $req_no_surat->save();

        Alert::success('Berhasil', 'Permintaan berhasil diajukan!');

        return back();
    }

    
    public function update(Request $request) {

        $nosurat = ReqNoSurat::findOrFail($request->id);
        $nosurat->update($request->all());

        Alert::success('Berhasil', 'Nomor Surat berhasil dikirim!');

        return back();
    }
    
}
