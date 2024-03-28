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
        Schema::create('cheques', function (Blueprint $table) {
            $table->id();
            $table->integer('cheque_number');
            $table->date('emission_date');
            $table->date('payment_date');
            $table->string('beneficiary');
            $table->float('montant');
            $table->string('concern');
            $table->string('remarks');
            $table->unsignedBigInteger('carnet_id');
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('carnet_id')->references('id')->on('carnets')->onDelete('cascade');
        });
    }
    // cheque_number: '',
    // emission_date: '',
    // payment_date: '',
    // beneficiary: '',
    // montant: '',
    // concern: '',
    // remarks: ''
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cheques');
    }
};
