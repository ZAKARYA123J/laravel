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
        Schema::create('carnets', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->unsignedBigInteger('id_comptes');
            $table->string('ville');
            $table->string('cosdecarnet');
            $table->string('serie');
            $table->string('first');
            $table->string('last');
            $table->integer('remaining_checks')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('id_comptes')->references('id')->on('comptes')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('carnets');
    }
};
