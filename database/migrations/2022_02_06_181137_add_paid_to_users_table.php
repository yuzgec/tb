<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaidToUsersTable extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->boolean('is_admin')->default('0');
        });
    }


    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
