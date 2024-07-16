<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavItemsTable extends Migration
{
    public function up()
    {
        Schema::create('nav_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->boolean('is_dropdown')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('nav_items')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('nav_items');
    }
}