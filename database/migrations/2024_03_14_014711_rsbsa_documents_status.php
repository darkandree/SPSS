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
        //id, document_id, no_forms, receivefrom_id, receivedby_id, date_received, received_remarks
        //distributedby_id, date_distributed, encodedby_id, encodedstatus_id, distributed_remarks, returnedto_id, 
        //date_returned, returned_remarks

        Schema::create('rsbsa_documents_status' , function (Blueprint $table) {
            $table->id();
            $table->string('document_id');
            $table->integer('no_forms');
            $table->integer('receivedfrom_id')->nullable();
            $table->string('receivedby_id')->nullable();
            $table->date('date_received')->nullable();
            $table->text('received_remarks')->nullable();
            $table->string('distributedby_id')->nullable();
            $table->date('date_distributed')->nullable();
            $table->string('encodedby_id')->nullable();
            $table->integer('encodedstatus_id')->nullable();
            $table->text('distributed_remarks')->nullable();
            $table->string('returnedto_id')->nullable();
            $table->date('date_returned')->nullable();
            $table->text('returned_remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::drop('rsbsa_documents_status');
    }
};
