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
        Schema::create('affiliates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('company_name')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('referrel_code')->nullable();
            $table->string('landmark_area')->nullable();
            $table->integer('is_agree_policy')->default(0);
            $table->integer('status')->default(0);
            $table->text('payment')->nullable();
            $table->text('account_name')->nullable();
            $table->text('account_number')->nullable();
            $table->text('networks')->nullable();
            $table->text('bank_account_name')->nullable();
            $table->text('bank_account_number')->nullable();
            $table->text('bank_name')->nullable();
            $table->text('branch')->nullable();
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
        Schema::dropIfExists('affiliates');
    }
};
