<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('option1')->nullable();
            $table->integer('option2')->nullable();
            $table->integer('option3')->nullable();
            $table->integer('option4')->nullable();
            $table->integer('condition')->nullable();
            $table->integer('translator')->nullable();
        });
    }


    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
