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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->ulid('id_pengaduan')->primary();
            $table->ulid('id_pengadu')->nullable();
            $table->foreign('id_pengadu')->references('id_user')->on('user')->onDelete('cascade')->nullable();
            $table->string('nama_pengadu', 100);
            $table->string('tentang_pengaduan', 100);
            $table->text('deskripsi_pengaduan');
            $table->integer('status_pengaduan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
