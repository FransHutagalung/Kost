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
        //
        Schema::table('info_kosts', function (Blueprint $table) {
            $table->string('nama_kost');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('email');
            $table->string('website');
            $table->string('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
