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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->float('score')->default(0);
            $table->integer('isSuccessful')->default(false);
            $table->integer('isFinished')->default(false);
            $table->unsignedBigInteger('skill_id');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('skill_id')->references('id')->on('skills')->cascadeOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
};
