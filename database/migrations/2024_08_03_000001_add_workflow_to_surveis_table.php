<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('surveis', function (Blueprint $table) {
            // Siapa yang input data ini (user RT)
            $table->unsignedBigInteger('created_by')->nullable()->after('id');
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();

            // Status alur validasi
            $table->enum('status', [
                'draft',
                'menunggu_rw',
                'menunggu_kelurahan',
                'siap_diinformasikan',
                'diinformasikan',
            ])->default('draft')->after('created_by');

            $table->text('catatan_rw')->nullable()->after('status');
            $table->text('catatan_kelurahan')->nullable()->after('catatan_rw');
            $table->enum('hasil_kelurahan', ['disetujui', 'ditolak'])->nullable()->after('catatan_kelurahan');
            $table->timestamp('informasi_dikirim_at')->nullable()->after('hasil_kelurahan');
        });
    }

    public function down(): void
    {
        Schema::table('surveis', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropColumn(['created_by', 'status', 'catatan_rw', 'catatan_kelurahan', 'hasil_kelurahan', 'informasi_dikirim_at']);
        });
    }
};
