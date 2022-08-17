<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaginStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campagin_stock', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->integer('campaing_id')->nullable();
            $table->integer('stock')->default(300);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('campagin_stock');
    }
}
