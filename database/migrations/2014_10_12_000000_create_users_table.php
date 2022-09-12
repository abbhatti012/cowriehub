<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('referrer_id')->nullable()->default(0);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('role');
            $table->string('avatar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->longText('code')->nullable();
            $table->string('verification_code')->nullable();
            $table->longText('fcm_token')->nullable();
            $table->unsignedBigInteger('created_by')->default(0);
            $table->integer('checkout')->default(0);
            $table->integer('checkin')->default(0);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
