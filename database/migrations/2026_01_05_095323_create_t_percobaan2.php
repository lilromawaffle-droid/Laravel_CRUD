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
        Schema::create('t_percobaan2', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('kelas', 10);
            $table->string('jurusan', 100);
            $table->string('email', 100);
            $table->string('no_telepon', 15);
            $table->string('usia', 2);
            $table->string('jenis_kelamin', 10);
            $table->string('alamat', 255);
            $table->string('kota', 100);
            $table->string('provinsi', 100);
            $table->string('kode_pos', 5);
            $table->integer('tinggi');
            $table->integer('berat');
            $table->string('nis', 10);
            $table->string('nisn', 10);
            $table->string('no_ujian', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_percobaan2');
    }
};
