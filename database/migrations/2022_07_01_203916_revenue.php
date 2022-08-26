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
        Schema::create('revenue', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('role')->nullable();
            $table->unsignedBigInteger('order_id');
            $table->float('total_amount')->default(0);
            $table->float('user_amount')->default(0);
            $table->float('affiliate_amount')->default(0);
            $table->float('consultant_amount')->default(0);
            $table->integer('payment_status')->default(0);
            $table->integer('admin_payment_status')->default(0);
            $table->integer('is_referrer')->default(0);
            $table->string('payment_note')->nullable();
            $table->string('payment_proof')->nullable();
            $table->longText('payment_note')->nullable();
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
        Schema::dropIfExists('revenue');
    }
};
