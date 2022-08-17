<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaidToProductsTable extends Migration
{

    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('freecargo')->nullable();
            $table->boolean('fastkargo')->nullable();
            $table->boolean('bigopportunity')->nullable();
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
