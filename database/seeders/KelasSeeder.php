<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KelasSeeder extends Seeder
{
    public function run()
    {
        $jurusan = ['TAV', 'RPL', 'DKV', 'TKJ', 'TOI', 'TITL'];

        // Lokasi kelas: format [A-Z][1-2][0-9]
        // Huruf = Gedung, Angka1 = Lantai (1/2), Angka2 = Nomor Ruang
        $lokasi = [
            'TAV'  => ['A10', 'A11'],
            'RPL'  => ['A12', 'A13'],
            'DKV'  => ['B10', 'B11'],
            'TKJ'  => ['B12', 'B13'],
            'TOI'  => ['C10', 'C11'],
            'TITL' => ['C12', 'C13'],
        ];

        $wali_kelas = [
            'TAV'  => ['Budi Santoso, S.Pd',    'Siti Rahayu, S.Pd'],
            'RPL'  => ['Ahmad Fauzi, S.Kom',     'Dewi Lestari, S.Kom'],
            'DKV'  => ['Rizki Pratama, S.Ds',    'Rina Marlina, S.Ds'],
            'TKJ'  => ['Hendra Gunawan, S.T',    'Yuli Astuti, S.T'],
            'TOI'  => ['Dian Permana, S.T',      'Fitri Handayani, S.T'],
            'TITL' => ['Agus Setiawan, S.T',     'Novi Anggraini, S.T'],
        ];

        $data = [];

        foreach ($jurusan as $j) {
            foreach ([1, 2] as $kelas) {
                $index = $kelas - 1; // index 0 atau 1

                $data[] = [
                    'nama_kelas'      => $j . ' ' . $kelas,
                    'jurusan'         => $j,
                    'lokasi_kelas'    => $lokasi[$j][$index],
                    'nama_wali_kelas' => $wali_kelas[$j][$index],
                    'created_at'      => now(),
                    'updated_at'      => now(),
                ];
            }
        }

        DB::table('t_kelas')->insert($data);
    }
}
