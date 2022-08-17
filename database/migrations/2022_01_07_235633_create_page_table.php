<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageTable extends Migration
{

    public function up()
    {
        Schema::create('page', function (Blueprint $table) {

            $table->id();

            $table->string('title');
            $table->string('slug')->nullable();

            $table->integer('category')->nullable();
            $table->string('gallery')->nullable();

            $table->longText('short')->nullable();
            $table->longText('desc')->nullable();

            $table->string('seo_title')->nullable();
            $table->string('seo_desc')->nullable();
            $table->string('seo_key')->nullable();

            $table->boolean('status')->default(1);
            $table->integer('rank')->nullable();

            $table->softDeletes();
            $table->timestamps();

        });
    }

}
