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
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('specialist_id');
            $table->unsignedInteger('hospital_id');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('status');
            $table->integer('price');
            $table->string('phone');
            $table->string('location');
            $table->timestamps();

            $table->foreign('specialist_id')->references('id')->on('specialists')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('hospital_id')->references('id')->on('hospitals')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
