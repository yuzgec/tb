<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqTable extends Migration
{

    public function up()
    {
        Schema::create('faq', function (Blueprint $table) {
            $table->id();
            $table->string('title');

            $table->integer('category')->default(1);

            $table->longText('short')->nullable();
            $table->longText('desc')->nullable();

            $table->boolean('status')->default(1);
            $table->integer('rank')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faq');
    }
}
