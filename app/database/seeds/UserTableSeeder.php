<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$user = new User();
		$user->nombre = 'DANIEL GUILLERMO ROMERO GELVEZ';
		$user->email = 'danielromeroauk@gmail.com';
		$user->password = Hash::make('123');
		$user->save();

		foreach(range(1, 10) as $index)
		{
			$user = new User();
			$user->nombre = $faker->name;
			$user->email = $faker->email;
			$user->password = Hash::make('123');
			$user->save();
		}
	}

}