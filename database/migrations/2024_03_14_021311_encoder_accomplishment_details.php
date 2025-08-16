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
        Schema::create('encoder_accomplishment_details', function (Blueprint $table){
            $table->id();
            $table->string('document_id')->nullable();
            $table->string('upload_id');
            $table->string('encodedby_id');
            $table->string('rsbsa_no');
            $table->string('fullname');
            $table->string('sex');
            $table->date('birthday');
            $table->date('date_encoded');
            $table->string('upload_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::drop('encoder_accomplishment_details');
    }
};
