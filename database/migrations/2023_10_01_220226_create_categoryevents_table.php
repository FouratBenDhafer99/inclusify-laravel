<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryEventsTable extends Migration
{
    public function up()
    {
        Schema::create('categoryevents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // Add more columns as needed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categoryevents');
    }
}
