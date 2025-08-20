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
    $table->date('payment_date');
    $table->unsignedBigInteger('student_id');
    $table->unsignedBigInteger('group_id');
    $table->timestamps();

    $table->foreign('student_id')
          ->references('id')
          ->on('students')
          ->onDelete('cascade');

    $table->foreign('group_id')
          ->references('id')
          ->on('groups')
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
