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
        Schema::create('dtks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->char('nik');
            $table->char('kk');
            $table->char('nomor_kontak');
            $table->string('keperluan');
            $table->timestamps();
            $table->softDeletes(); // [FIX] SoftDeletes: tambah kolom deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dtks');
    }
};
