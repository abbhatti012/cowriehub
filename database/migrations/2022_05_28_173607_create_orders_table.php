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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_owner_id')->nullable();
            $table->text('role')->nullable();
            $table->unsignedBigInteger('book_id');
            $table->integer('is_preorder');
            $table->string('extra_type');
            $table->float('book_price');
            $table->float('extra_price');
            $table->float('total_price');
            $table->integer('quantity');
            $table->float('remaining_price')->nullable();
            $table->float('amount_paid')->nullable();
            $table->softDeletes();
            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
