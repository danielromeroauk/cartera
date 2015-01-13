<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/***
	 * Devuelte un array que puede ser usado para rellenar elementos select de HTML
	 * @return array
	 */
	public static function users_array()
	{
		$users = User::orderBy('nombre', 'ASC')->get();
		$users_array = array();

		foreach ($users as $user)
		{
			$users_array[$user->id] = $user->nombre;
		}

		return $users_array;
	} #users_array

} #User
