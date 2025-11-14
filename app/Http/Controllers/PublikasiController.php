<?php

namespace App\Http\Controllers;
use App\Models\Publikasi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\File;
use RealRashid\SweetAlert\Facades\Alert;

class PublikasiController extends Controller
{
    public function show()
    {
        $bidang = \Auth::user()->bidang;

        if ($bidang == 'Kominfo') {
            $publikasis = DB::table('publikasis')->select('id','judul','jenis','pic_name','status','pic_kontak', 'created_at','lampiran','tanggal_publikasi','pic_bidang','hasil_publikasi')->paginate(10);
            return view('pages/publikasi-pengajuan')->with('publikasis', $publikasis);
        } else {
            $publikasis = DB::table('publikasis')->where('pic_bidang', $bidang)->select('id','judul','jenis','pic_name','status','pic_kontak', 'created_at','lampiran','tanggal_publikasi','pic_bidang','hasil_publikasi')->paginate(10);
            return view('pages/publikasi-pengajuan-admin')->with('publikasis', $publikasis);
        }

    }

    public function create()
    {
        return view('pages/publikasi-pengajuan-buat');
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
            'tanggal_publikasi' => 'required',
            'keterangan_slide' => 'nullable',
            'deskripsi' => 'nullable',
            'hasil_publikasi' => 'nullable',
        ]);

        $lampiran = $request->file('lampiran');
        
        $nama_file = $lampiran->getClientOriginalName();

        $lampiran->move('public/file-lampiran', $lampiran->getClientOriginalName());

        $req_publikasi = new Publikasi;
        $req_publikasi->lampiran = $nama_file;
        $req_publikasi->status = $request->input('status');
        $req_publikasi->judul = $request->input('judul');
        $req_publikasi->jenis = $request->input('jenis');
        $req_publikasi->pic_kontak = $request->input('pic_kontak');
        $req_publikasi->pic_name = $request->input('pic_name');
        $req_publikasi->keterangan_slide = $request->input('keterangan_slide');
        $req_publikasi->deskripsi = $request->input('deskripsi');
        $req_publikasi->hasil_publikasi = $request->input('hasil_publikasi');
        $req_publikasi->tanggal_publikasi = $request->input('tanggal_publikasi');
        $req_publikasi->pic_bidang = $request->input('pic_bidang');

        $req_publikasi->save();

        Alert::success('Berhasil', 'Permintaan publikasi berhasil diajukan!');

       return back();
    }

    public function update(Request $request) {
        
        $publikasi = Publikasi::findOrFail($request->id);
        $publikasi->update($request->all());

        Alert::success('Berhasil', 'Tautan publikasi berhasil dikirim!');

        return back();
    }
}
