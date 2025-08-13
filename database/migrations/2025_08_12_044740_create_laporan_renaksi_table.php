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
            $table->enum('kategori', ['A', 'B', 'C', 'D']); 
            $table->text('sasaran');
            $table->text('indikator')->nullable();

            // Target sasaran
            $table->string('target_tw1')->nullable();
            $table->string('target_tw2')->nullable();
            $table->string('target_tw3')->nullable();
            $table->string('target_tw4')->nullable();

            // Realisasi
            $table->string('realisasi_tw1')->nullable();
            $table->string('realisasi_tw2')->nullable();
            $table->string('realisasi_tw3')->nullable();
            $table->string('realisasi_tw4')->nullable();

            // Capaian
            $table->string('capaian_triwulan')->nullable();
            $table->string('persen_capaian')->nullable(); 
            $table->string('persen_capaian_akumulasi')->nullable(); 

            // Catatan & tindak lanjut
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
