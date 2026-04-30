<?php

namespace App\Http\Controllers\Api;

use \App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;

class SiswaApiController extends Controller
{
    use ValidatesRequests;
    public function index()
    {
        $data = DB::table('t_siswa')->get();
        return response()-> json($data);
    }

    
    public function store(Request $request)
    {
        $request ->validate ([
            'nis' => 'required|numeric',
            'nama_lengkap' => 'required|string',
            'jk' => 'required',
            'golongan_darah' => 'required',
        ]);
        $status = DB::table('t_siswa')
         ->insert($request->only(['nis','nama_lengkap','jk','golongan_darah']));

         return response()->json([
            'succes'  => $status,
            'message' => $status? 'Data berhasil disimpan':'data gagal disimpan'
         ],$status ? 201:400);
    }

    public function patchupdate(Request $request, $id)
    {
        $request->validate( [
            'nis' => 'nullable|numeric',
            'nama_lengkap' => 'nullable|string',
            'jk' => 'nullable',
            'golongan_darah' => 'nullable',
        ]);

        $data = array_filter( $request
            ->only(['nis', 'nama_lengkap', 'jk', 'golongan_darah']));

        if (empty($data)) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada data yang diberikan untuk diperbarui'
            ], 400);
        }

        $status = DB::table(table: 't_siswa')
            ->where( 'id', $id)
            ->update( $data);

        return response()->json([
            'success' => $status ? true : false,
            'message' => $status ? 'Data sebagian berhasil diperbarui (PATCH)' : 'Gagal update data'
        ], $status ? 200 : 400);
    }

    public function putupdate(Request $request, $id)
    {
        $request->validate( [
            'nis' => 'required|numeric',
            'nama_lengkap' => 'required|string',
            'jk' => 'required',
            'golongan_darah' => 'required',
        ]);

        $status = DB::table( 't_siswa')
            ->where( 'id',  $id)
            ->update( $request->only(keys: ['nis', 'nama_lengkap', 'jk', 'golongan_darah']));

        return response()->json([
            'success' => $status ? true : false,
            'message' => $status ? 'Seluruh data berhasil diperbarui (PUT)' : 'Gagal update data'
        ],  $status ? 200 : 400);
    }
    public function destroy($id)
    {
        $status = DB::table('t_siswa')
            ->where('id', $id)->delete();

        return response()->json([
            'success' => $status ? true : false,
            'message' => $status ? 'Data berhasil dihapus' : 'Gagal hapus data'
        ], $status ? 200 : 400);
    }

}