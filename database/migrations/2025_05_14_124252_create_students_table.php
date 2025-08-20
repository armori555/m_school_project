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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string("name");
            $table->string("family_name");
            $table->date("birth_date")->nullable();
            $table->string("adress")->nullable();
            $table->integer("phone_number")->nullable();
            $table->string("email")->nullable();
            $table->integer("paid_amount");
            $table->integer("unpaid_amount")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
