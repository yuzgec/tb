<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTable extends Migration
{

    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->id();
            $table->string('item');
            $table->string('value');
            $table->string('isImage')->nullable();
            $table->string('isType')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('setting');
    }
}
