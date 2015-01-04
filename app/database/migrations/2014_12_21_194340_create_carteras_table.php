<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarterasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carteras', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('documento', 255); // Pagar/Cobrar
			$table->string('prefijo', 255); // Factura/Remisión
			$table->string('fisico', 255);
			$table->string('pedido', 255)->nullable();
			$table->decimal('valor', 16, 2);
			$table->string('notas', 1000)->nullable();
			$table->integer('tercero_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->timestamps();

			$table->foreign('tercero_id')
					->references('id')->on('terceros')
					->onDelete('NO ACTION')
					->onUpdate('CASCADE');

			$table->foreign('user_id')
					->references('id')->on('users')
					->onDelete('NO ACTION')
					->onUpdate('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('carteras');
	}

}
