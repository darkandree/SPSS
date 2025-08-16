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
        Schema::create('encoder_accomplishment', function (Blueprint $table){
            $table->id();
            $table->string('upload_id')->unique();
            $table->integer('upload_year');
            $table->string('upload_month');
            $table->string('uploader_id');
            $table->integer('vstatus_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::drop('encoder_accomplishment');
    }
};
