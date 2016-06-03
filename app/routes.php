<?php

Route::controller('home', 'HomeController');

Route::get('/', array('as' => 'home', function()
{
	return Redirect::route('listado_de_terceros');
}));

Route::group(array('before' => 'guest'), function()
{
	Route::get('entrar', [
		'as' => 'login',
		'uses' => 'UserController@login'
	]);

	Route::post('autenticando', [
		'as' => 'autenticar',
		'uses' => 'UserController@autenticar'
	]);
});

Route::group(array('before' => 'auth'), function()
{
	// Sesión de usuario
	Route::get('cambiar-password', [
		'as' => 'cambiar_password',
		'uses' => 'UserController@cambiar_password'
	]);

	Route::post('actualizar-password', [
		'as' => 'actualizar_password',
		'uses' => 'UserController@actualizar_password'
	]);

	Route::get('salir', [
		'as' => 'logout',
		'uses' => 'UserController@logout'
	]);


	// Auxiliar: Terceros
	Route::get('crear-tercero', [
		'as' => 'crear_tercero',
		'uses' => 'TerceroController@create'
	]);

	Route::post('guardar-tercero', [
		'as' => 'guardar_tercero',
		'uses' => 'TerceroController@store'
	]);

	Route::get('terceros', [
		'as' => 'listado_de_terceros',
		'uses' => 'TerceroController@index'
	]);

	Route::get('buscar-tercero', [
		'as' => 'buscar_tercero',
		'uses' => 'TerceroController@buscar'
	]);

	Route::get('mostrar-tercero/{id}', [
		'as' => 'mostrar_tercero',
		'uses' => 'TerceroController@show'
	]);


	// Auxiliar: Cuentas bancarias
	Route::get('crear-cuenta/{tercero}', [
		'as' => 'crear_cuenta',
		'uses' => 'CuentaController@create'
	]);

	Route::post('guardar-cuenta', [
		'as' => 'guardar_cuenta',
		'uses' => 'CuentaController@store'
	]);


	// Auxiliar: Carteras
	Route::get('crear-cartera/{documento}/{tercero}', [
		'as' => 'crear_cartera',
		'uses' => 'CarteraController@create'
	]);

	Route::post('guardar-cartera', [
		'as' => 'guardar_cartera',
		'uses' => 'CarteraController@store'
	]);

	Route::get('carteras/{documento}/{tercero}', [
		'as' => 'listado_de_carteras',
		'uses' => 'CarteraController@index'
	]);

	Route::get('buscar-cartera/{documento}/{tercero}', [
		'as' => 'buscar_cartera',
		'uses' => 'CarteraController@buscar'
	]);

	// Auxiliar: Abonos
	Route::get('mostrar-abonos/{cartera_id}', [
		'as' => 'mostrar_abonos',
		'uses' => 'AbonoController@index'
	]);


	// Auxiliar: informe de carteras
	Route::get('informe-general-de-carteras/{documento}', [
		'as' => 'cartera_general',
		'uses' => 'CarteraController@general'
	]);


	// Auxiliar: Vencimientos por fecha de vencimiento.
	Route::get('vencimientos-por-fecha-de-vencimiento/{documento}', [
		'as' => 'vencimientos',
		'uses' => 'CarteraController@vencimientos'
	]);

	// Auxiliar: Vencimientos por dias transcurridos.
	Route::get('vencimientos-por-dias-transcurridos/{documento}', [
		'as' => 'vencimientos2',
		'uses' => 'CarteraController@vencimientos2'
	]);


	// Permisos de administrador
	Route::group(array('before' => 'administrador'), function()
	{
		// Administrador: Terceros
		Route::get('editar-tercero/{id}', [
			'as' => 'editar_tercero',
			'uses' => 'TerceroController@edit'
		]);

		Route::post('actualizar-tercero', [
			'as' => 'actualizar_tercero',
			'uses' => 'TerceroController@update'
		]);


		// Administrador: Cuentas bancarias
		Route::get('editar-cuenta/{id}', [
			'as' => 'editar_cuenta',
			'uses' => 'CuentaController@edit'
		]);

		Route::post('actualizar-cuenta', [
			'as' => 'actualizar_cuenta',
			'uses' => 'CuentaController@update'
		]);


		// Administrador: Carteras
		Route::get('editar-cartera/{id}', [
			'as' => 'editar_cartera',
			'uses' => 'CarteraController@edit'
		]);

		Route::post('actualizar-cartera', [
			'as' => 'actualizar_cartera',
			'uses' => 'CarteraController@update'
		]);


		// Administrador: Abonos
		Route::get('abonar-cartera/{id_cartera}', [
			'as' => 'abonar_cartera',
			'uses' => 'AbonoController@create'
		]);

		Route::post('guardar-abono', [
			'as' => 'guardar_abono',
			'uses' => 'AbonoController@store'
		]);

		Route::get('editar-abono/{id}', [
			'as' => 'editar_abono',
			'uses' => 'AbonoController@edit'
		]);

		Route::post('actualizar-abono', [
			'as' => 'actualizar_abono',
			'uses' => 'AbonoController@update'
		]);

	}); #administrador
}); #auth