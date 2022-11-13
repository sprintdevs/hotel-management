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
            $table->string('name');
            $table->enum('type', ['STANDARD', 'DUPLEX', 'DELUX']);
            $table->float('price');
            $table->enum('bed_type', ['SINGLE', 'DOUBLE', 'KING', 'QUEEN']);
            $table->integer('bed_count');
            $table->json('furniture');
            $table->boolean('balcony');
            $table->json('services');
            $table->json('complimentaries');
            $table->unsignedBigInteger('floor_id');
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
