<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryEventsTable extends Migration
{
    public function up()
    {
        Schema::create('category_events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
    }


    public function down()
    {
        Schema::dropIfExists('categoryevents');
    }
}