<?php

namespace App;
use Illuminate\Database\Eloquent\Model ;

class Kelas extends Model{
    public $table = 't_kelas';
    protected $fillable = [
        'nama_wali_kelas','lokasi_kelas','nama_kelas','jurusan'
    ];
}
?>