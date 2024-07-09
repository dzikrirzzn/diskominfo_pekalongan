<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('other_berita', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('subtitle');
        $table->text('content');
        $table->string('author');
        $table->date('date');
        $table->string('image');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('other_berita');
}

};