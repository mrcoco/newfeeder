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
        Schema::create('biodata_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_mahasiswa');
            $table->string('nama_mahasiswa',100);
            $table->char('jenis_kelamin',1);
            $table->string('tempat_lahir',32);
            $table->date('tanggal_lahir');
            $table->foreignId('agama_id')->constrained()->onDelete('cascade');
            $table->char('nik',16);
            $table->char('nisn',10);
            $table->foreignId('kewarganegaraan_id')->constrained()->onDelete('cascade');
            $table->string('kelurahan',60);
            $table->foreignId('wilayah_id')->constrained()->onDelete('cascade');
            $table->char('penerima_kps');
            $table->string('nama_ibu_kandung',100);
            $table->char('kebutuhan_khusus_mahasiswa_id',1)->default(0);
            $table->char('kebutuhan_khusus_ayah_id',1)->default(0);
            $table->char('kebutuhan_khusus_ibu_id',1)->default(0);
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
        Schema::dropIfExists('biodata_mahasiswas');
    }
};
