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

	public function cambiar_password()
	{
		return View::make('users.cambiar_password');
	}

	public function actualizar_password()
	{
		$input = Input::all();

		$credenciales = [
				'email' => Auth::user()->email,
				'password' => $input['password_actual']
		];

		if (Auth::attempt($credenciales))
		{
			$reglas = [
					'nuevo_password' => 'required|min:5|confirmed'
			];

			$validador = Validator::make($input, $reglas);

			if ($validador->passes())
			{
				Auth::user()->password = Hash::make($input['nuevo_password']);
				Auth::user()->save();

				Session::flash('mensaje', 'Clave cambiada con éxito.');

				return Redirect::route('listado_de_terceros');
			}
			else
			{
				return Redirect::back()->withErrors($validador);
			}
		}
		else
		{
			return Redirect::route('logout');
		}
	} #actualizar_password

} #UserController