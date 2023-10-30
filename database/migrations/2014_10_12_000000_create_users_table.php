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
        Schema::create('user', function (Blueprint $table) {
            $table->ulid('id_user')->primary();
            $table->string('nama_user', 100);
            $table->string('username', 50);
            $table->string('email_user', 255);
            $table->string('password_user');
            $table->string('foto_user');
            $table->string('identitas_user');
            $table->integer('role_user')->default(0);
            $table->integer('status_user')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
