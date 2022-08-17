<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBasketColumn extends Migration
{

    public function up()
    {
        Schema::table('basket', function (Blueprint $table) {
            $table->string('basket_name')->nullable();
        });
    }


    public function down()
    {
        Schema::table('basket', function (Blueprint $table) {
            //
        });
    }
}
