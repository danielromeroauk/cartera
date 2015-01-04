<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTercerosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('terceros', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nit', 255)->unique();
			$table->string('nombre', 255);
			$table->string('direccion', 255)->nullable();
			$table->string('telefono', 255)->nullable();
			$table->string('email', 255)->nullable();
			$table->string('estado', 255)->default('ACTIVO');
			$table->string('notas', 1000)->nullable();
			$table->integer('user_id')->unsigned();
			$table->timestamps();

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
		Schema::drop('terceros');
	}

}
