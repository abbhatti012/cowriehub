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
            $table->text('role');
            $table->string('hero_image')->nullable();
            $table->string('cover')->nullable();
            $table->string('sample')->nullable();
            $table->string('trailer')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->float('price');
            $table->float('quantity');
            $table->string('subtitle')->nullable();
            $table->string('synopsis')->nullable();
            $table->string('genre');
            $table->string('sub_author')->nullable();
            $table->integer('publisher_id')->default(0);
            $table->string('publisher')->nullable();
            $table->string('country')->nullable();
            $table->string('publication_date');
            $table->integer('status')->default(0);
            $table->float('hard_price')->nullable();
            $table->float('hard_page')->nullable();
            $table->string('hard_isbn')->nullable();
            $table->float('hard_weight')->nullable();
            $table->string('hard_ship')->nullable();
            $table->string('hard_allow_preorders')->nullable();
            $table->string('hard_expected_shipment')->nullable();
            $table->float('hard_stock')->nullable();
            $table->float('paper_price')->nullable();
            $table->float('paper_page')->nullable();
            $table->string('paper_isbn')->nullable();
            $table->float('paper_weight')->nullable();
            $table->string('paper_ship')->nullable();
            $table->string('paper_allow_preorders')->nullable();
            $table->string('paper_expected_shipment')->nullable();
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
            $table->integer('is_campaign')->default(0);
            $table->integer('old_price')->nullable();
            $table->string('cover_type')->nullable();
            $table->integer('total_reviews')->nullable();
            $table->integer('book_purchased')->default(0);
            $table->integer('total_ratings')->nullable();
            $table->integer('searches')->nullable()->default(0);
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
