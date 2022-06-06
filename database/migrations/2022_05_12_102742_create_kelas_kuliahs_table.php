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
        Schema::create('kelas_kuliahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prodi_id')->constrained()->onDelete('cascade');
            $table->foreignId('semester_id')->constrained()->onDelete('cascade');
            $table->foreignId('mata_kuliah_id')->constrained()->onDelete('cascade');
            $table->char('nama_kelas_kuliah',5);
            $table->integer('pditt');
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
        Schema::dropIfExists('kelas_kuliahs');
    }
};
