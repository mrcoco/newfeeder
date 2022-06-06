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
        Schema::create('nilai_perkuliahan_kelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('riwayat_pendidikan_mahasiswa_id')->constrained()->onDelete('cascade');
            $table->foreignId('kelas_kuliah_id')->constrained()->onDelete('cascade');
            $table->float('nilai_angka',4,1);
            $table->float('nilai_indeks',4,2);
            $table->char('nilai_huruf',3);
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
        Schema::dropIfExists('nilai_perkuliahan_kelas');
    }
};
