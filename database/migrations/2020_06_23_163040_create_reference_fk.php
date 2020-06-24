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
            $table->foreign('user_id')->references('id')->on('user');
        });

        Schema::table('news', function ($table) {
            $table->foreign('user_id_create')->references('id')->on('user');
        });

        Schema::table('comment', function ($table) {
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('product_id')->references('id')->on('product');
        });

        Schema::table('order', function ($table) {
            $table->foreign('customer_id')->references('id')->on('user');
        });

        Schema::table('product', function ($table) {
            $table->foreign('type_product_id')->references('id')->on('type_product');
        });

        Schema::table('order_detail', function ($table) {
            $table->foreign('bill_id')->references('id')->on('order');
            $table->foreign('product_id')->references('id')->on('product');
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
