<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailSubcribesTable extends Migration
{

    public function up()
    {
        Schema::create('mail_subcribes', function (Blueprint $table) {
            $table->id();
            $table->string('email_address', 50);
            $table->boolean('is_customer')->default(0);
            $table->ipAddress('ip_address');
            $table->timestamps();
        });
    }

     public function down()
    {
        Schema::dropIfExists('mail_subcribes');
    }
}
