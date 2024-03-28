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
        Schema::create('comptes', function (Blueprint $table) {
            $table->id();
            $table->string('Compte'); // Change to string if it's an account number
            $table->unsignedBigInteger('societe_id'); // Change to unsignedBigInteger for foreign key
            $table->unsignedBigInteger('banque_id'); // Change to unsignedBigInteger for foreign key
            $table->timestamps(); // Laravel will automatically manage created_at and updated_at timestamps

            // Define foreign key constraint
            $table->foreign('societe_id')->references('id')->on('societes')->onDelete('cascade');
            $table->foreign('banque_id')->references('id')->on('banques')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comptes');
    }
};
