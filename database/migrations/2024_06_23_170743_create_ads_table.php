<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('href')->unique();
            $table->string('imageUrl');
            $table->string('title');
            $table->string('price');
            $table->string('location');
            $table->string('rooms');
            $table->string('size');
            $table->string('type');
            $table->string('endDate');
            $table->string('detailUrl')->nullable();
            $table->text('description')->nullable();
            $table->text('conditions')->nullable();
            $table->text('features')->nullable();
            $table->text('prices')->nullable();
            $table->text('rules')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
