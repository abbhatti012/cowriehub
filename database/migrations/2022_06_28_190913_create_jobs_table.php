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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('marketing_id');
            $table->unsignedBigInteger('assign_to');
            $table->longText('admin_note')->nullable();
            $table->integer('job_status')->default(0);
            $table->integer('is_completed')->default(0);
            $table->longText('reject_note')->nullable();
            $table->longText('document')->nullable();
            $table->longText('document_note')->nullable();
            $table->longText('payment_note')->nullable();
            $table->string('payment_proof')->nullable();
            $table->integer('confirmation')->default(0);
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
        Schema::dropIfExists('jobs');
    }
};
