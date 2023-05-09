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
        Schema::create('table_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number', 20);
            $table->string('email')->nullable();
            $table->string('date');
            $table->time('time');
            $table->integer('number_of_people')->unsigned()->default(1);
            $table->string('status')->default('pending');
            $table->string('table_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_reservations');
    }
};
