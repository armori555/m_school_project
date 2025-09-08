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
        Schema::create('payments', function (Blueprint $table) {
    $table->id();
    $table->unsignedInteger('amount');
    $table->dateTime('payment_date');
    $table->unsignedBigInteger('studentlanguage_id');
    $table->timestamps();

    $table->foreign('studentlanguage_id')
          ->references('id')
          ->on('studentlanguages')
          ->onDelete('cascade');


});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
