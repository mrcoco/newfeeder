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
        Schema::create('perubahan_riwayat_pendidikan_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('riwayat_pendidikan_mahasiswa_id')->constrained()->onDelete('cascade');
            $table->foreignId('semester_id')->constrained()->onDelete('cascade');
            $table->foreignId('prodi_id')->constrained()->onDelete('cascade');
            $table->char('nim_lama',24);
            $table->char('nim_baru',24);
            $table->date('tanggal_daftar');
            $table->date('tanggal_pindah');
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
        Schema::dropIfExists('perubahan_riwayat_pendidikan_mahasiswas');
    }
};
