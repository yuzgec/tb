<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsTable extends Migration
{

    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();

            $table->longText('address')->nullable();
            $table->string('provice')->nullable();
            $table->string('city')->nullable();
            $table->longText('map')->nullable();

            $table->longText('message')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('rank')->nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_us');
    }
}
