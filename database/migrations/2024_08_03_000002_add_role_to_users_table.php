<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['kelurahan', 'rw', 'rt'])
                  ->default('rt')
                  ->after('password');

            // Nomor RT hanya diisi untuk role RT.
            $table->string('rt_number', 10)->nullable()->after('role');

            // Nomor RW diisi untuk role RT dan RW.
            $table->string('rw_number', 10)->nullable()->after('rt_number');

            // ID village pada IndoRegion bertipe char(10), bukan bigInteger.
            $table->char('village_id', 10)->nullable()->after('rw_number')->index();
            $table->foreign('village_id')
                  ->references('id')
                  ->on('villages')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['village_id']);
            $table->dropColumn(['role', 'rt_number', 'rw_number', 'village_id']);
        });
    }
};
