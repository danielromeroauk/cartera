<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnVencimientoToCarteras extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('carteras', function(Blueprint $table)
		{
			$table->dateTime('vencimiento');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('carteras', function(Blueprint $table)
		{
			$table->dropColumn('vencimiento');
		});
	}

}
