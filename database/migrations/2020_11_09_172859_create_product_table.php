<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('p_name');
            $table->integer('category_id');
            $table->integer('sub_cat_id');
            $table->integer('brand_id');
            $table->string('color');
            $table->string('size')->nullable();
            $table->string('qty');
            $table->integer('unit');
            $table->string('s_price')->nullable();
            $table->string('c_price')->nullable();
            $table->string('promo_code');
            $table->string('video');
            $table->text('p_desc')->nullable();
            $table->string('l_p')->nullable();
            $table->string('p_p')->nullable();
            $table->string('t_p')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamp('Time')->useCurrent();
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
