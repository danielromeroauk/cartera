<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAbonosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('abonos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('cartera_id')->unsigned();
			$table->integer('cuenta_id')->unsigned()->nullable();
			$table->integer('user_id')->unsigned();
			$table->string('forma_pago');
			$table->decimal('monto', 16, 2)->unsigned();
			$table->string('notas', 1000)->nullable();
			$table->timestamps();

			$table->foreign('cartera_id')
					->references('id')->on('carteras')
					->onDelete('NO ACTION')
					->onUpdate('CASCADE');

			$table->foreign('cuenta_id')
					->references('id')->on('cuentas')
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
		Schema::drop('abonos');
	}

}
