<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('marketing_orders', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->unsignedBigInteger('user_id');
            $table->string('txn_id');
            $table->integer('marketing_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('marketing_orders');
    }
};
