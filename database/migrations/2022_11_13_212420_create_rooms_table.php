<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('floor_id');
            $table->string('name');
            $table->string('category');
            $table->float('price');
            $table->string('bed_type');
            $table->integer('bed_count');
            $table->json('furniture');
            $table->boolean('balcony');
            $table->json('services');
            $table->json('complimentaries');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
