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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->longText('transaction_id')->nullable();
            $table->string('location')->nullable();
            $table->string('precise_location');
            $table->string('post_code')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('country')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->longText('notes')->nullable();
            $table->string('subtotal');
            $table->string('total_amount');
            $table->string('shipping_price');
            $table->string('amount_paid')->nullable();
            $table->string('extraType')->nullable();
            $table->float('extraPrice')->nullable();
            $table->float('book_id')->nullable();
            $table->string('status')->nullable();
            $table->integer('is_fraud')->default(0);
            $table->integer('is_preorder')->default(0);
            $table->longText('token');
            $table->longText('payment_method')->nullable();
            $table->integer('is_coupon')->default(0);
            $table->string('coupon_code')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
