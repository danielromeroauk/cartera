<?php

class Tercero extends \Eloquent {

	protected $fillable = [];
	protected $perPage = 12;

	public function user()
	{
		$this->belongsTo('User');
	}

	public function cuentas()
	{
		return $this->hasMany('Cuenta');
	}

	public function carteras()
	{
		return $this->hasMany('Cartera');
	}

	public static function rulesCreate()
	{
		$rulesCreate = [
				'nit' 		=> 'required|min:5|unique:terceros,nit',
				'nombre' 	=> 'required|min:3'
		];

		return $rulesCreate;
	}

	public static function rulesUpdate($id)
	{
		$rulesUpdate = [
				'nit' 		=> 'required|min:5|unique:terceros,nit,'. $id,
				'nombre' 	=> 'required|min:3'
		];

		return $rulesUpdate;
	}

	/***
	 * Retorna un array personalizado para crear elementos SELECT de HTML
	 * @return array
	 */
	public function cuentas_array()
	{
		$cuentas_array['NULL'] = 'Ninguna';

		foreach ($this->cuentas as $cuenta)
		{
			$cuentas_array[$cuenta->id] = $cuenta->banco .' '. $cuenta->tipo .' '. $cuenta->numero;
		}

		return $cuentas_array;
	} #cuentas_array

} #Tercero