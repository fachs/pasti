<?php

namespace App\Http\Controllers;
use App\Models\Desain;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\File;
use RealRashid\SweetAlert\Facades\Alert;

class DesainController extends Controller
{
    public function show()
    {
        
        $bidang = \Auth::user()->bidang;

        if ($bidang == 'Kominfo') {
            $desains = DB::table('desains')->select('id','judul','jenis','pic_name','status','pic_kontak', 'created_at','lampiran')->paginate(10);
            return view('pages/publikasi-desain')->with('desains', $desains);
        } else {
            $desains = DB::table('desains')->where('pic_bidang', $bidang)->select('id','judul','jenis','pic_name','status','pic_kontak', 'created_at','lampiran')->paginate(10);
            return view('pages/publikasi-desain-admin')->with('desains', $desains);
        }

    }

    public function create()
    {
        return view('pages/desain-pengajuan-buat');
    }

    public function store(Request $request) {
        
        // return $request->file('file_surat')->store('public');
        $this->validate($request, [
            'lampiran' => 'required|mimes:jpg,png,jpeg,pdf,doc,docx|max:5048',
            'status' => 'required',
            'judul' => 'required',
            'jenis' => 'required',
            'pic_kontak' => 'required',
            'pic_name' => 'required',
            'pic_bidang' => 'required',
            'keterangan_slide' => 'required',
            'deskripsi' => 'required',
            'hasil_desain' => 'required',
        ]);

        $lampiran = $request->file('lampiran');
        
        $nama_file = $lampiran->getClientOriginalName();

        $lampiran->move('public/file-lampiran', $lampiran->getClientOriginalName());

        $req_desain = new Desain;
        $req_desain->lampiran = $nama_file;
        $req_desain->status = $request->input('status');
        $req_desain->judul = $request->input('judul');
        $req_desain->jenis = $request->input('jenis');
        $req_desain->pic_kontak = $request->input('pic_kontak');
        $req_desain->pic_name = $request->input('pic_name');
        $req_desain->keterangan_slide = $request->input('keterangan_slide');
        $req_desain->deskripsi = $request->input('deskripsi');
        $req_desain->pic_bidang = $request->input('pic_bidang');
        $req_desain->hasil_desain = $request->input('hasil_desain');

        $req_desain->save();

        Alert::success('Berhasil', 'Permintaan desain berhasil diajukan!');

        return back();
    }

    public function update(Request $request) {

        $hasil_desain = Desain::findOrFail($request->id);

     
            $path = public_path().'/uploads/images/';
  
            // //code for remove old file
            if($hasil_desain->file != '-'  && $hasil_desain->file != null){
                 $file_old = $path.$hasil_desain->file;
                 unlink($file_old);
            }
  
            //upload new file
            $file = $request->hasil_desain;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
  
            //for update in table
            $hasil_desain->update(['status' => 'Selesai']);
            $hasil_desain->update(['file_ttd' => $filename]);

            Alert::success('Berhasil', 'Desain berhasil diunggah!');       

        return back();
    }
}
