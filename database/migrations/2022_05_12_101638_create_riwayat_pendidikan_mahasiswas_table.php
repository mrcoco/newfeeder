<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pendidikan_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_registrasi_mahasiswa');
            $table->foreignId('biodata_mahasiswa_id')->constrained()->onDelete('cascade');
            $table->char('nim',24);
            $table->foreignId('jenis_pendaftaran_id')->constrained()->onDelete('cascade');
            $table->foreignId('jalur_masuk_id')->constrained()->onDelete('cascade');
            $table->foreignId('semester_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_daftar');
            $table->foreignId('prodi_id')->constrained()->onDelete('cascade');
            $table->integer('sks_diakui');
            $table->foreignId('perguruan_tinggi_id')->constrained()->onDelete('cascade');
            $table->foreignId('prodi_pt_id')->constrained()->onDelete('cascade');
            $table->foreignId('pembiayaan_id')->constrained()->onDelete('cascade');
            $table->float('biaya_masuk',16,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_pendidikan_mahasiswas');
    }
};
