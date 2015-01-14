<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnComprobanteToAbonos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('abonos', function(Blueprint $table)
		{
			// Campo para especificar el recibo de caja, comprobante de egreso y/o soporte contable
			$table->string('comprobante', 255);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('abonos', function(Blueprint $table)
		{
			$table->dropColumn('comprobante');
		});
	}

}
