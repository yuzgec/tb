<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketsTable extends Migration
{

    public function up()
    {
        Schema::create('basket', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('basket');
    }
}
