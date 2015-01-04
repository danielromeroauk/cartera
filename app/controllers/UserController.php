<?php

class UserController extends BaseController {

	public function autenticar()
	{
		$email = Input::get('email');
		$password = Input::get('password');
		$remember = is_null(Input::get('remember')) ? false : true;

		if (Auth::attempt(array('email' => $email, 'password' => $password), $remember))
		{
			return Redirect::route('home');
		}
		else
		{
			return Redirect::route('login');
		}
	}

	public function login()
	{
		return View::make('users.login');
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::route('login');
	}
}