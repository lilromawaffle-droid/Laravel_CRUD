<?php

namespace App\Http\Controllers;

use App\Guru;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class GuruController extends Controller
{
    use ValidatesRequests;


    public function index()
    {
        $data['t_guru'] = \App\Guru::orderBy('nama_guru')->get();
        return view('guru', $data);
    }


    public function create()
    {
        return view('guru.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip'            => 'required|digits:18|unique:t_guru,nip',
            'nama_guru'      => 'required|string',
            'jenis_kelamin'  => 'required|in:Laki-laki,Perempuan',
            'alamat'         => 'required|string',
        ]);

        // ORM INSERT
        $status = \App\Guru::create($request->all());

        if ($status) {
            return redirect('/guru')->with('succes', 'Data guru berhasil ditambahkan');
        } else {
            return redirect('/guru')->with('error', 'Data guru gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $tabel = \App\Guru::find($id);

        if (!$tabel) {
            return redirect('/guru')->with('error', 'Data guru tidak ditemukan');
        }

        return view('guru.form', compact('tabel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nip'            => 'required|digits:18|unique:t_guru,nip,' . $id,
            'nama_guru'      => 'required|string',
            'jenis_kelamin'  => 'required|in:Laki-laki,Perempuan',
            'alamat'         => 'required|string',
        ]);

        // ORM UPDATE
        $guru = \App\Guru::find($id);
        $guru->nip           = $request->nip;
        $guru->nama_guru     = $request->nama_guru;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->alamat        = $request->alamat;
        $status = $guru->save();

        if ($status) {
            return redirect('/guru')->with('succes', 'Data guru berhasil diubah');
        } else {
            return redirect('/guru')->with('error', 'Data guru gagal diubah');
        }
    }

    public function destroy($id)
    {
        $guru   = \App\Guru::find($id);
        $status = $guru->delete();

        if ($status) {
            return redirect('/guru')->with('succes', 'Data guru berhasil dihapus');
        } else {
            return redirect('/guru')->with('error', 'Data guru gagal dihapus');
        }
    }
}