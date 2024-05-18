<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->enum('status', ['ready', 'pending', 'sold']);
            $table->text('address');
            $table->text('description');
            $table->integer('sqft');
            $table->integer('bath');
            $table->integer('garage');
            $table->integer('floor');
            $table->integer('bed');
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
        Schema::dropIfExists('property');
    }
};
