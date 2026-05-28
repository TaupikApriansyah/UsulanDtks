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
        Schema::create('surveis', function (Blueprint $table) {
            $table->id();
            $table->char('nik', 16);
            $table->char('kk', 16);
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('ibu');
            $table->string('jenis_kelamin');
            $table->string('pekerjaan');
            $table->string('status_nikah');
            $table->string('alamat');
            $table->char('province_id', 2)->index();
            $table->char('regencie_id', 4)->index();
            $table->char('district_id', 7)->index();
            $table->char('village_id', 10)->index();
            $table->string('status_disabilitas');
            $table->string('jenis_disabilitas')->nullable();
            $table->string('status_kehamilan');
            $table->date('tanggal_kehamilan')->nullable();
            $table->string('quest1');
            $table->string('quest2');
            $table->string('quest3');
            $table->string('quest4');
            $table->string('quest5');
            $table->string('quest6');
            $table->string('quest7');
            $table->string('quest8');
            $table->string('quest9');
            $table->string('quest10');
            $table->string('foto_ktp');
            $table->string('foto_rumah');
            $table->string('nomor_kontak', 15);
            $table->string('latitude');
            $table->string('longitude');  // [FIX] Rename dari longtitude → longitude
            $table->string('foto_rumah_dalam');
            $table->string('keterangan');
            $table->timestamps();
            $table->softDeletes(); // [FIX] SoftDeletes: tambah kolom deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveis');
    }
};
