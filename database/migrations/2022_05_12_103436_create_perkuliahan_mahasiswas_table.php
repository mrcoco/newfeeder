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
        Schema::create('perkuliahan_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('riwayat_pendidikan_mahasiswa_id')->constrained()->onDelete('cascade');
            $table->foreignId('semester_id')->constrained()->onDelete('cascade');
            $table->foreignId('status_mahasiswa_id')->constrained()->onDelete('cascade');
            $table->double('ips',4,2);
            $table->double('ipk',4,2);
            $table->integer('sks_semester');
            $table->integer('total_sks');
            $table->float('biaya_kuliah_smt',16,2);
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
        Schema::dropIfExists('perkuliahan_mahasiswas');
    }
};
