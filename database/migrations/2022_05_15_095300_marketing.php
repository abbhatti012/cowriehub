<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('marketing', function (Blueprint $table) {
            $table->id();
            $table->string('package')->nullable();
            $table->float('price')->nullable();
            $table->string('duration')->nullable();
            $table->longText('point')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('marketing');
    }
};
