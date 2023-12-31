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
        Schema::create('evaluasi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_alternatif')->default(0);
            $table->foreign('id_alternatif')->references('id_alternatif')->on('alternatif')->onDelete('cascade');
            $table->unsignedBigInteger('id_kriteria')->default(0);
            $table->foreign('id_kriteria')->references('id_kriteria')->on('kriteria')->onDelete('cascade');
            $table->integer('nilai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasi');
    }
};
