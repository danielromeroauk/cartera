<?php

use Faker\Factory as Faker;

class HomeController extends BaseController {

	public function getShowWelcome()
	{
		$user = User::find(1);
		$user->password = Hash::make('123');
		$user->save();
		
		return View::make('hello');
	}

	public function getCreateUsers()
	{
		$faker = Faker::create();

		$user = new User();
		$user->nombre = 'DANIEL GUILLERMO ROMERO GELVEZ';
		$user->email = 'danielromeroauk@gmail.com';
		$user->password = Hash::make('123');
		$user->rol = 'administrador';
		$user->save();

		foreach(range(1, 10) as $index)
		{
			$user = new User();
			$user->nombre = $faker->name;
			$user->email = $faker->email;
			$user->password = Hash::make('123');
			$user->rol = 'auxiliar';
			$user->save();
		}

		return 'Usuarios creados';
	} #getCreateUsers

} #HomeController
