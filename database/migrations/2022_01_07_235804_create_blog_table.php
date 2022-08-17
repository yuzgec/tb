<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{

    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');

            $table->integer('category')->default(1);

            $table->longText('short')->nullable();
            $table->longText('desc')->nullable();

            $table->string('seo_title', 250)->nullable();
            $table->string('seo_desc', 250)->nullable();
            $table->string('seo_key', 250)->nullable();

            $table->boolean('status')->default(1);
            $table->integer('rank')->nullable();

            $table->date('publish_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog');
    }
}
