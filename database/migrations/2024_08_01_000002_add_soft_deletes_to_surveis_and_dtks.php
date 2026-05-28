<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambahkan kolom deleted_at (SoftDeletes) ke tabel surveis dan dtks.
     * Jalankan ini jika tabel sudah ada (existing database).
     */
    public function up(): void
    {
        // [FIX] SoftDeletes untuk tabel surveis
        if (!Schema::hasColumn('surveis', 'deleted_at')) {
            Schema::table('surveis', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        // [FIX] SoftDeletes untuk tabel dtks
        if (!Schema::hasColumn('dtks', 'deleted_at')) {
            Schema::table('dtks', function (Blueprint $table) {
                $table->softDeletes();
            });
        }
    }

    public function down(): void
    {
        Schema::table('surveis', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('dtks', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
