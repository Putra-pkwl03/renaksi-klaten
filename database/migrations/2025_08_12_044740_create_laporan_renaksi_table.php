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
         Schema::create('laporan_renaksi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('category_id');
            $table->uuid('unit_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');

            $table->text('sasaran');
            $table->text('indikator')->nullable();

            $table->string('target_tw1')->nullable();
            $table->string('target_tw2')->nullable();
            $table->string('target_tw3')->nullable();
            $table->string('target_tw4')->nullable();

            $table->string('realisasi_tw1')->nullable();
            $table->string('realisasi_tw2')->nullable();
            $table->string('realisasi_tw3')->nullable();
            $table->string('realisasi_tw4')->nullable();

            $table->string('capaian_triwulan')->nullable();
            $table->string('persen_capaian')->nullable();
            $table->string('persen_capaian_akumulasi')->nullable();

            $table->text('catatan_hasil_monitoring')->nullable();
            $table->text('tindak_lanjut')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_renaksi');
    }
};
