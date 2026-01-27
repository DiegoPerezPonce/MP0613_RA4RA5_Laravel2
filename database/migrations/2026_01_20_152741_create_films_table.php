<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->integer('year');
            $table->string('genre', 100);
            $table->string('img_url', 500);
            $table->string('country', 100);
            $table->integer('duration');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('films');
    }
};
