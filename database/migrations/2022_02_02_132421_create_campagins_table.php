<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaginsTable extends Migration
{

    public function up()
    {
        Schema::create('campagins', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');

            $table->string('external')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->integer('stock')->nullable();

            $table->double('price', 2);
            $table->double('old_price',2)->nullable();

            $table->string('sku');

            $table->longText('short')->nullable();
            $table->string('note')->nullable();
            $table->string('cargo')->nullable();
            $table->longText('featrues')->nullable();
            $table->longText('desc')->nullable();

            $table->string('seo_title', 250)->nullable();
            $table->string('seo_desc', 250)->nullable();
            $table->string('seo_key', 250)->nullable();

            $table->boolean('status')->default(1);
            $table->integer('rank')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('campagins');
    }
}
