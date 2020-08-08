<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->datetime('tarikh_terima_permohonan')->nullable();
            $table->string('bill_permohonan')->nullable();
            $table->string('kod_subjek')->nullable();
            $table->string('kelas')->nullable();
            $table->string('nama')->nullable();
            $table->string('kategori')->nullable();
            $table->string('pnp')->nullable();
            $table->string('aim')->nullable();
            $table->string('kepimpinan')->nullable();
            $table->string('keusahawanan')->nullable();
            $table->datetime('tarikh')->nullable();
            $table->integer('bil_peserta')->nullable();
            $table->integer('jumlah_peg_pengiring')->nullable();
            $table->string('tempat')->nullable();
            $table->string('kp_notel')->nullable();
            $table->float('anggaran_kos')->nullable();
            $table->float('kos_diluluskan')->nullable();
            $table->string('catatan')->nullable();
            $table->datetime('tarikh_terima')->nullable();
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
        Schema::dropIfExists('records');
    }
}
