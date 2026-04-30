<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;


class KelasController extends Controller
{
    use ValidatesRequests;
    public function index(){
        
    $table = 't_kelas';

    // Kolom yang boleh diisi via create() atau update()

        //$tabel =DB::table('t_kelas')->orderBy('nama_kelas','ASC')->get();
        //return view('kelas',compact('tabel'));  
        $data ['t_kelas'] = \App\Kelas::orderBy('nama_kelas')->get();
        return view ('kelas',$data);
        }
    
    
    function create(){
      return view ('kelas.form');
    }

    function store (Request $request){
        $request->validate([
            'nama_wali_kelas'=>'required|string',
            'lokasi_kelas'=> ['required', 'regex:/^[A-Z][1-2][0-9]$/'] ,
            'jurusan'=>'required',
            'nama_kelas'=>'required',
        ]
        
        );    

        $input = $request->all();
        //unset($input['_token']);
        //$status = DB::table('t_kelas')->insert($input);
        $status = \App\Kelas::create($input);
        if ($status){
              return redirect('/kelas') ->with('succes','Data yang anda masukan berhasil di tambahkan tekan tambah data untuk memasukan data lagi');
        }else{
              return redirect('/kelas') ->with('error','Data yang anda masukan tidak berhasil di tambahkan tekan tambah data untuk memasukan data lagi');
        }
    }

    function edit (Request $request, $id){
        $tabel = DB::table('t_kelas')->find($id);
        return view ('kelas.form', compact('tabel'));
    }
    
    function update(Request $request, $id)
    {
        $rule = [
            'nama_wali_kelas' => 'required|string',
            'lokasi_kelas'    => ['required', 'regex:/^[A-Z][1-2][0-9]$/'],
            'jurusan'         => 'required',
            'nama_kelas'      => 'required',
        ];
        $this->validate($request, $rule);

        $input = $request->all();

        // ORM Eloquent 
        $kelas = \App\Kelas::find($id);
        $kelas->nama_wali_kelas = $input['nama_wali_kelas'];
        $kelas->lokasi_kelas    = $input['lokasi_kelas'];
        $kelas->jurusan         = $input['jurusan'];
        $kelas->nama_kelas      = $input['nama_kelas'];
        $status = $kelas->update();

        if ($status) {
            return redirect('/kelas')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('/kelas/edit/' . $id)->with('error', 'Data gagal diubah');
        }
    }

    function destroy (Request $request, $id){
        $status = DB::table('t_kelas')->where ('id',$id)->delete();
        if ($status){
            return redirect('/kelas') ->with('succes','Data berhasil di hapus');
        }else{
            return redirect('/kelas') ->with('error','Data gagal di hapus');
        }   
    }
    
    
    
    

/*
    function routeSatu(){
        $desk['random'] = 'ini adalah gambar random yang saya temukan di google';
        $desk['wpp'] = 'ini adalah gradasi warna';
        return view ('contoh.contoh',$desk);
        
    }
    
    function routeDua(){
        $isi = '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."';
        return view ('contoh.contoh_lagi',compact('isi'));
        
    }
    
    function routeTiga(){
        $kelamin = 'femboy';
        $nama = 'razan';
        echo 'kita coba text yang lain';
        return view('contoh.contoh_terakhir', compact('nama','kelamin'));
    }   */
}

