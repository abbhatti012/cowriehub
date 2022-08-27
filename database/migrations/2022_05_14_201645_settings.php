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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('affiliate_commission')->nullable();
            $table->string('consultant_commission')->nullable();
            $table->string('user_commission')->nullable();
            $table->longText('privacy_policy')->nullable();
            $table->longText('content_policy')->nullable();
            $table->longText('terms')->nullable();
            $table->longText('affiliate_network_agreement')->nullable();
            $table->longText('authors_contract')->nullable();
            $table->longText('marketers_networks_agreement')->nullable();
            $table->longText('referred_customers_agreement')->nullable();
            $table->longText('seller_contracts_for_authors')->nullable();
            $table->longText('seller_contracts_for_publishers')->nullable();
            $table->longText('about_us')->nullable();
            $table->longText('about_banner')->nullable();
            $table->text('instagram_followers')->nullable();
            $table->text('facebook_followers')->nullable();
            $table->text('youtube_followers')->nullable();
            $table->text('tumbler_followers')->nullable();
            $table->longText('free_delivery')->nullable();
            $table->longText('secure_payment')->nullable();
            $table->longText('money_back')->nullable();
            $table->longText('support')->nullable();
            $table->text('support_phone')->nullable();
            $table->text('support_email')->nullable();
            $table->text('support_address')->nullable();
            $table->text('pinterest_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->text('youtube_link')->nullable();
            $table->text('facebook_link')->nullable();
            $table->text('instagram_link')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
