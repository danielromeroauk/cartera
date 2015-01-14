<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TerceroTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 100) as $index)
		{
			Tercero::create([
				'nit'					=> $faker->unique()->bothify('###.###.###-#'),
				'nombre'			=> $faker->name,
				'direccion'		=> $faker->address,
				'telefono'		=> $faker->phoneNumber,
				'email'				=> $faker->email,
				'notas'				=> $faker->realText(1000),
				'user_id'			=> 1
			]);
		}
	}

}