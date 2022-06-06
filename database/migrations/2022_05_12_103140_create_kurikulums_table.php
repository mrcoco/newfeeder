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
        Schema::create('kurikulums', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kurikulum');
            $table->foreignId('prodi_id')->constrained()->onDelete('cascade');
            $table->foreignId('semester_id')->constrained()->onDelete('cascade');
            $table->integer('jumlah_sks_lulus');
            $table->integer('jumlah_sks_wajib');
            $table->integer('jumlah_sks_pilihan');
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
        Schema::dropIfExists('kurikulums');
    }
};
