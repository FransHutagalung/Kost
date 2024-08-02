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
        Schema::create('requestKamar'  , function(Blueprint $table){
                $table->id();
                $table->unsignedBigInteger('id_kamar');
                $table->foreign('id_kamar')->references('id')->on('kamar');
                $table->unsignedBigInteger('id_user');
                $table->foreign('id_user')->references('id')->on('users');
                $table->timestamps();
                $table->enum('status', ['pending', 'accepted', 'declined']);
                $table->date('check_in_date')->nullable();
                $table->date('check_out_date')->nullable();
                $table->text('request_reason')->nullable();
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
