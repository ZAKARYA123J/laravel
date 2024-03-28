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
        Schema::create('printcheques', function (Blueprint $table) {
            $table->id();
            $table->float('montant');
            $table->string('montant_lettere');
            $table->string('ordre');
            $table->string('place');
            $table->date('date');
            $table->unsignedBigInteger('cheque_id');
            $table->foreign('cheque_id')->references('id')->on('cheques')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('printcheques');
    }
};
