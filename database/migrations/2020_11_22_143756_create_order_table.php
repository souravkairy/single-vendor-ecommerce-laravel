<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('c_id');
            $table->string('payment_id');
            $table->string('paying_amount');
            $table->string('stripe_order_id');
            $table->string('payment_method');
            $table->string('bln_transection');
            $table->string('sub_total');
            $table->string('shipping_cost');
            $table->string('vat');
            $table->string('total');
            $table->string('month')->nullable();
            $table->string('date')->nullable();
            $table->string('year')->nullable();
            $table->tinyInteger('status')->value(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
