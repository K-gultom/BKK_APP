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
        Schema::create('layak_terbangs', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('user_id');

            // Data Dokter
            $table->string('nama_dokter');
            $table->string('nomor_sip');
            $table->string('instansi');

            // Data Pasien
            $table->string('nama_pasien');
            $table->date('tgl_lahir');
            $table->integer('usia');
            $table->string('jenis_kelamin');
            $table->string('nomor_identitas');
            $table->date('tgl_pemeriksaan');

            // Rencana Perjalanan
            $table->date('tgl_penerbangan');
            $table->string('kota_asal');
            $table->string('kota_tujuan');

            // Status
            $table->string('status')->default('Sedang Diproses');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layak_terbangs');
    }
};
