<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('user_id')->unsigned();
                        $table->foreign('user_id')->references('id')->on('users');
                        $table->string('purchaser_name', 255);
                        $table->string('item_description', 255);
                        $table->decimal('item_price', 7,2);
                        $table->integer('purchase_count');
                        $table->string('merchant_address', 255);
                        $table->string('merchant_name', 255);
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
		Schema::drop('sales');
	}

}
