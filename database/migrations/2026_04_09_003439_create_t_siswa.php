<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_siswa1', function (Blueprint $table) {
            $table->id(); // Membuat kolom id (Primary Key, Auto Increment)
            $table->string('nama_kelas');
            $table->string('jurusan');
            $table->string('Nama_wali_kelas');
            $table->string('lokasi_kelas');
            $table->timestamps(); // Membuat kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_siswa');
    }
};
