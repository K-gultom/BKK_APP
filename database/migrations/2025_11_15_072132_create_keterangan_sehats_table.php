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
        Schema::create('keterangan_sehats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            // Data Dokter
            $table->string('nama_dokter');
            $table->string('nomor_sip');
            $table->string('instansi');

            // Data Pasien
            $table->string('nama_pasien');
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('pekerjaan');
            $table->string('alamat');

            // Pemeriksaan Fisik
            $table->string('tekanan_darah');
            $table->integer('nadi');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->string('suhu');
            $table->string('buta_warna');
            $table->string('riwayat_penyakit')->nullable();

            // Tujuan & Surat
            $table->string('tujuan');
            $table->string('tempat_surat');
            $table->date('tanggal_surat');

            
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
        Schema::dropIfExists('keterangan_sehats');
    }
};
