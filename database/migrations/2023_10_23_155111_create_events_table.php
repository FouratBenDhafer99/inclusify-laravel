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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->dateTime('date');
            $table->string('location');
            $table->enum('status', ['UPCOMING', 'ONGOING', 'PAST', 'CANCELED']);
            $table->integer('capacity');
            $table->dateTime('registration_deadline');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('organizer_id'); // Corrected column name
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('organizer_id')->references('id')->on('users'); // Corrected column name

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
        Schema::dropIfExists('events');
    }
};
