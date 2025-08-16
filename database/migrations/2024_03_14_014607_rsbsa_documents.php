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
        //id, document_id, province_id_ municipality_id, storage_id, file_location
        

        Schema::create('rsbsa_documents', function (Blueprint $table) {
           $table->id();
           $table->string('document_id')->unique();
           $table->integer('province_id');
           $table->integer('municipality_id');
           $table->integer('storage_id');
           $table->text('file_location')->nullable();
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::drop('rsbsa_documents');
    }
};
