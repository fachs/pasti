<?php

namespace App\Http\Controllers;

use App\Models\KodeAset;
use App\Models\KodeBarang;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index()
    {

    }

    public function indexAdmin()
    {
        // $bidang = \Auth::user()->bidang;
        
        // $prokers = DB::table('program_kerjas')->where('nama_bidang', $bidang)->select('id','nama','progress','tanggal_pelaksanaan', 'pic_1','nama_bidang')->get();
        // $bidangs = DB::table('bidangs')->select('id','nama')->get();
        // $tasks = DB::table('tasks')->select('id','nama','proker_id','prioritas', 'deadline', 'isDone')->get();

        // return view('pages/index-admin')->with('prokers', $prokers)->with('bidangs', $bidangs)->with('tasks', $tasks);
        return view('pages/index-admin');
    }

    public function dbp()
    {
        return view('pages/dbp');
    }

    public function aset()
    {
        $kode_asets = KodeAset::all(); 
        $kode_barangs = KodeBarang::all(); 

        return view('pages/aset', compact(['kode_asets','kode_barangs']));
    }

    public function kodeBarang()
    {
        return view('pages/kode-barang');
    }

    public function kodeAset()
    {
        $kode_asets = KodeAset::all(); 
        
        return view('pages/kode-aset', compact('kode_asets'));
    }

    public function keuangan()
    {
        // $user = \Auth::user()->bidang;

        // if ($user == 'Keuangan') {
        //     return view('pages/keuangan-admin');
        // } else {
        //     return view('pages/keuangan');
        // }
    }

    public function keuanganIn()
    {
        return view('pages/keuangan');
    }

    public function tentang()
    {
        return view('pages/tentang');
    }

    public function keuanganRab()
    {
        
        $rab = DB::table('rabs')->select('status','total_pengajuan', 'created_at')->paginate(10);

        return view('pages/keuangan-rab')->with('rab', $rab);
    }

    public function keuanganRabKeuangan()
    {
        return view('pages/keuangan-rab-keuangan');
    }

    public function keuanganRabAudit($id)
    {
        $rabs = DB::table('rabs')->select('id','status','rincian','proker_id','harga','kuantitas','total', 'created_at','bidang')->paginate(10);

        return view('pages/keuangan-rab-audit')->with('rabs', $rabs);
    }

    public function keuanganLaporanKeuangan()
    {
        $prokers = DB::table('program_kerjas')->select('nama','nama_bidang')->paginate(10);
        // $bidang = \Auth::user()->bidang;

        // if ($bidang == 'Keuangan') {

        //     $laporanIns = DB::table('lap_keuangan_ins')->select('id','sumber','jumlah','tanggal')->paginate(10);
        //     $laporanOuts = DB::table('lap_keuangan_outs')->select('id','penerima','uraian','harga_satuan', 'harga_satuan', 'kuantitas', 'total', 'tanggal')->paginate(10);

        //     return view('pages/keuangan-laporan-keuangan')->with('laporanOuts', $laporanOuts)->with('laporanIns', $laporanIns)->with('prokers', $prokers);
        // } else {

        //     $laporanIns = DB::table('lap_keuangan_ins')->where('bidang',$bidang)->select('id','sumber','jumlah','tanggal')->paginate(10);
        //     $laporanOuts = DB::table('lap_keuangan_outs')->where('bidang',$bidang)->select('id','penerima','uraian','harga_satuan', 'harga_satuan', 'kuantitas', 'total', 'tanggal')->paginate(10);

        //     return view('pages/keuangan-laporan-keuangan-admin')->with('laporanOuts', $laporanOuts)->with('laporanIns', $laporanIns);
        // }
        
    }

    public function keuanganLaporanKeuanganAudit($id)
    {
        
        $laporanIns = DB::table('lap_keuangan_ins')->where('bidang',$id)->select('id','sumber','jumlah','tanggal','bidang')->paginate(10);
        $laporanOuts = DB::table('lap_keuangan_outs')->where('bidang',$id)->select('id','penerima','uraian','harga_satuan', 'harga_satuan', 'kuantitas', 'total', 'tanggal','bidang')->paginate(10);

        return view('pages/keuangan-laporan-keuangan-audit')->with('laporanOuts', $laporanOuts)->with('laporanIns', $laporanIns);
 
    }

    public function keuanganSptbh()
    {
        $sptbs = DB::table('sptbs')->select('himpunan','nominal_iuk','jumlah_mhs', 'pic', 'pic_nim', 'pic_wa', 'lampiran_sptb', 'lampiran_nList')->get();

        return view('pages/keuangan-sptbh')->with('sptbs', $sptbs);
    }

    
}
