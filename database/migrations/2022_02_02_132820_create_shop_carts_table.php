<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopCartsTable extends Migration
{

    public function up()
    {
        Schema::create('shop_carts', function (Blueprint $table) {
            $table->id();
            $table->integer('cart_id');
            $table->integer('user_id')->nullable();
            $table->decimal('basket_total', 10,2);

            $table->string('name');
            $table->string('surname');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('note')->nullable();

            $table->string('order_device')->nullable();
            $table->string('order_campaign')->nullable();
            $table->string('order_influcer')->nullable();
            $table->string('order_medium')->nullable();

            $table->double('order_cargo',10,2)->nullable();

            $table->string('basket_status')->default('Hazırlanıyor');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('shop_carts');
    }
}
