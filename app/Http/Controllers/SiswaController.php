<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;

class SiswaController extends Controller
{
    use ValidatesRequests;
    public function index()
    {
        $data['siswa'] = \App\Siswa::orderBy('jenkel')->get();
        return view('belajar', $data);
    }

    public function create()
    {
        return view('siswa.form');
    }

    public function store(Request $request)
    {
        $rule = [
            'nis' => 'required|numeric',
            'nama_lengkap' => 'required|string',
            'jenkel' => 'required',
            'goldar' => 'required',
        ];
        $this->validate($request, $rule);

        $input = $request->all();

        // ORM Eloquent for Inserting Data
        $siswa = new \App\Siswa;
        $siswa->nis = $input['nis'];
        $siswa->nama_lengkap = $input['nama_lengkap'];
        $siswa->jenkel = $input['jenkel'];
        $siswa->goldar = $input['goldar'];
        $status = $siswa->save();

        if ($status) {
            return redirect('/siswa')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('/siswa/create')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit(Request $request, $id) 
    {
        $siswa = DB::table('t_siswa')->find($id);
        return view('siswa.form', compact('siswa'));
    }
  
    public function update(Request $request, $id)
    {
        $rule = [
            'nis' => 'required|numeric',
            'nama_lengkap' => 'required|string',
            'jenkel' => 'required',
            'goldar' => 'required',
        ];
        $this->validate($request, $rule);
          
        $input = $request->all();

        // ORM Eloquent for Updating Data
        $siswa = \App\Siswa::find($id);
        $siswa->nis = $input['nis'];
        $siswa->nama_lengkap = $input['nama_lengkap'];
        $siswa->jenkel = $input['jenkel'];
        $siswa->goldar = $input['goldar'];
        $status = $siswa->update(); 
        // Catatan: Pada gambar 4 baris 69-70 menunjukkan penggunaan mass assignment:
        // $status = $siswa->update($input); 
        // Anda bisa menggunakan salah satunya sesuai preferensi.

        if ($status) {
            return redirect('/siswa')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('/siswa/create')->with('error', 'Data gagal diubah');
        }
    }

    public function destroy(Request $request, $id)
    {
        $siswa = \App\Siswa::find($id);
        $status = $siswa->delete(); 
  
        if ($status) {
            return redirect('/siswa')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/siswa/create')->with('error', 'Data gagal dihapus');
        }
    }
}
/*
namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
  public function index(){
  
    $data ['siswa'] =\App\Siswa::orderBy('golongan_darah')->get();
    return view ('belajar',$data);

  //  $siswa = DB::table ('t_siswa')->get();
  //  return view ('belajar',compact('siswa'));
    
    //$siswa = DB::table ('nama_tabel')->get();
      //$nama = "fajar";
      //$jk = "laki-laki";
    //return view ('namaView',compact('variable','variable1'));
  }

  function create(){
    return view ('siswa.form');
  }

  function store (Request $request){
    $rule = [
      'nis' => 'required|numeric',
      'nama_lengkap'=> 'required|string',
      'jk'=> 'required',
      'golongan_darah'=> 'required',
    ];

    $request->validate($rule);

    $input = $request->all();
    //unset($input['_token']);
    //$status = DB::table('t_siswa')->insert($input);
    
    //elequent
    //$status = \App\Siswa::create($input);

    //ORM
    $siswa= new \App\Siswa;
    $siswa->nis = $input ['nis'];
    $siswa->nama_lengkap = $input ['nama_lengkap'];
    $siswa->jk = $input ['jk'];
    $siswa->golongan_darah = $input['golongan_darah'];
    $status=$siswa->save();

    if ($status){
      return redirect('/siswa') ->with('succes','Data Berhasil di tambahkan');
    }else{
      return redirect('/siswa') ->with('succes','Data tidak Berhasil di tambahkan');
    }
  }

  function edit(Request $request, $id) {
    $siswa = DB::table('t_siswa')->find($id);
    return view ('siswa.form', compact('siswa'));
  }
  
  function update(Request $request, $id){
    $rule =[
      'nis' => 'required|numeric',
      'nama_lengkap'=> 'required|string',
      'jk'=> 'required',
      'golongan_darah'=> 'required',
      ];
      
    $request->validate( $rule);
      
    $input = $request ->all();
    //unset($input['_token'] );
    //unset($input['_method'] );
    //$status = DB::table('t_siswa')->where('id',$id)->update($input);
    
    //elequent
    
    $siswa = \App\Siswa::find($id);
    //$status = $siswa->update($input);

    //orm
    $siswa= new \App\Siswa;
    $siswa->nis = $input ['nis'];
    $siswa->nama_lengkap = $input ['nama_lengkap'];
    $siswa->jk = $input ['jk'];
    $siswa->golongan_darah = $input['golongan_darah'];
    $status=$siswa->save();

    if ($status){
      return redirect('/siswa') ->with('succes','Data berhasil di ubah');
    }else{
      return redirect('/siswa/edit/'.$id) ->with('error','Data gagal di ubah');
    }
  }

  function destroy(Request $request, $id){
  //elequent
  $siswa = \App\Siswa::find($id);
  $status = $siswa ->delete(); 
  
  //happus sesuai dengan id nu dikirim dari tombol delete
    //$status = DB::table('t_siswa')->where ('id',$id)->delete();

      if ($status){
      return redirect('/siswa') ->with('succes','Data berhasil di hapus');
    }else{
      return redirect('/siswa') ->with('error','Data gagal di hapus');
    }
  }
}

        /*
        $tabel =DB::table('t_kelas')->where('jurusan','=','RPL')->get();
        return view('kelas',compact('tabel'));  

        $tabel =DB::table('t_kelas')
        ->orderBy('jurusan','ASC')
        ->orderBy('nama_kelas','DESC')
        ->get();
        return view('kelas',compact('tabel'));  

        $tabel =DB::table('t_kelas')->where('Nama_wali_kelas','LIKE','a%')->get();
        return view('kelas',compact('tabel'));  
    

        $tabel =DB::table('t_kelas')->orderBy('lokasi_kelas','DESC')->get();
        return view('kelas',compact('tabel'));  
        
        $tabel =DB::table('t_kelas')->orderBy('lokasi_kelas','DESC')->get();
        return view('kelas',compact('tabel'));  

        */