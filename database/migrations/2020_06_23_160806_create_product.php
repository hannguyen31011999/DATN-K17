<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('type_product_id')->unsigned();
            $table->string('product_name');
            $table->text('description')->nullable();
            $table->integer('unit_price');
            $table->integer('promotion_price');
            $table->integer('qty');
            $table->char('image');
            $table->string('unit',10);
            $table->text('raw_material')->nullable();
            $table->text('origin')->nullable();
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
        Schema::dropIfExists('product');
    }
}
