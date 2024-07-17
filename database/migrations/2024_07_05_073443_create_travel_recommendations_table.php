<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelRecommendationsTable extends Migration
{
    public function up()
    {
        Schema::create('travel_recommendations', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('judul');
            $table->string('sub_judul');
            $table->text('isi');
            $table->string('map_location');
            $table->string('author');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('travel_recommendations');
    }
}
