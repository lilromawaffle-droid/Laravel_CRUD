<?php

namespace App;
use Illuminate\Database\Eloquent\Model ;

class Siswa extends Model{
    public $tabel = 't_kelas';
    protected $fillable = [
        'nama_wali_kelas','lokasi_kelas','nama_kelas','jurusan'
    ];
}
?>