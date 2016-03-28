<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('product', function($table){
			$table->increments('id');
			$table->integer('cid');
			$table->string('imgsrc');
			$table->string('title');
			$table->string('publisher');
			$table->string('company');
			$table->text('detail');
            $table->string('slug')->nullable();
			$table->boolean('hadstock')->default(true);
			$table->double('price',15,2);
			$table->softDeletes();
			$table->nullableTimestamps();
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
		Schema::drop('product');
	}

}
