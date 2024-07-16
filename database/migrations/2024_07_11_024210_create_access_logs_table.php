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
    Schema::create('access_logs', function (Blueprint $table) {
        $table->id();
        $table->string('page');
        $table->timestamp('accessed_at');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('access_logs');
}

};