<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferenceFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('member', function ($table) {
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });

        Schema::table('news', function ($table) {
            $table->foreign('user_id_create')->references('id')->on('user')->onDelete('cascade');
        });

        Schema::table('comment', function ($table) {
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
        });

        Schema::table('order', function ($table) {
            $table->foreign('customer_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('customer_id')->references('user_id')->on('member')->onDelete('cascade');
        });

        Schema::table('product', function ($table) {
            $table->foreign('type_product_id')->references('id')->on('type_product')->onDelete('cascade');
        });

        Schema::table('order_detail', function ($table) {
            $table->foreign('bill_id')->references('id')->on('order')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
        });

        Schema::table('district', function ($table) {
            $table->foreign('province_id')->references('id')->on('province')->onDelete('cascade');
        });

        Schema::table('village', function ($table) {
            $table->foreign('district_id')->references('id')->on('district')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reference_fk');
    }
}
