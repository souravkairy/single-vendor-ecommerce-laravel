<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping', function (Blueprint $table) {
            $table->increments('sh_id');
            $table->integer('order_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('country');
            $table->string('address1');
            $table->string('town');
            $table->string('post_code');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('notes')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping');
    }
}
