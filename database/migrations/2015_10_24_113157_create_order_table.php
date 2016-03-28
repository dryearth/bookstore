<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('order',function($table){
			$table->increments('id');
			$table->integer('mid');
			$table->boolean('handled')->default(false);
			$table->double('ttlprice',15,2);
			$table->string('receiver_name');
			$table->string('address_1');
			$table->string('address_2');
			$table->string('phone');
			$table->string('payment_method');
			$table->string('credit_card_number');
			$table->string('csv');
			$table->timestamp('delivery_date');
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
		//
		Schema::drop('order');
	}

}
