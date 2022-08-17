<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_categories', function (Blueprint $table) {
            $table->id();
            $table->nestedSet();

            $table->string('title');
            $table->string('slug');

            $table->longText('short')->nullable();
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
        Schema::dropIfExists('team_categories');
    }
}
