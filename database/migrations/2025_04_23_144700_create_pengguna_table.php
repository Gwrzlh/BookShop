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
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id('id_pengguna');
            $table->string('username')->unique();  // Username harus unik
            $table->string('nama_lengkap');
            $table->string('role');  // Role bisa admin, kasir, atau owner
            $table->string('password');
            $table->timestamps();  // Menyimpan waktu dibuat dan diubah
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};
