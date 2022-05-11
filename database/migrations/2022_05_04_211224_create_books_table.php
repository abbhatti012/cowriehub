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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('hero_image');
            $table->string('cover');
            $table->string('sample');
            $table->string('title');
            $table->float('price');
            $table->string('subtitle');
            $table->string('synopsis');
            $table->string('genre');
            $table->string('sub_author');
            $table->string('publisher');
            $table->string('country');
            $table->string('publication_date');
            $table->integer('status')->default(0);
            $table->float('hard_price')->nullable();
            $table->float('hard_page')->nullable();
            $table->string('hard_isbn')->nullable();
            $table->float('hard_weight')->nullable();
            $table->string('hard_ship')->nullable();
            $table->float('hard_stock')->nullable();
            $table->float('paper_price')->nullable();
            $table->float('paper_page')->nullable();
            $table->string('paper_isbn')->nullable();
            $table->float('paper_weight')->nullable();
            $table->string('paper_ship')->nullable();
            $table->float('paper_stock')->nullable();
            $table->float('digital_price')->nullable();
            $table->string('digital_page')->nullable();
            $table->string('digital_isbn')->nullable();
            $table->string('epub')->nullable();
            $table->integer('is_hardcover')->default(0);
            $table->integer('is_paperback')->default(0);
            $table->integer('is_digital')->default(0);
            $table->integer('is_featured')->default(0);
            $table->integer('is_sale')->default(0);
            $table->integer('is_most_viewed')->default(0);
            $table->integer('is_new')->default(0);
            $table->integer('is_biographies')->default(0);
            $table->integer('is_best')->default(0);
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
        Schema::dropIfExists('books');
    }
};
