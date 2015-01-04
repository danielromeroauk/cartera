<?php

class Cuenta extends \Eloquent {

	protected $fillable = [];
	protected $perPage = 12;

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function tercero()
	{
		return $this->belongsTo('Tercero');
	}

	public function abono()
	{
		return $this->belongsTo('Abono');
	}

	public static function rules()
	{
		$rules = [
				'banco' 	=> 'required|min:3',
				'tipo' 		=> 'required|min:3',
				'numero'	=> 'required|min:5'
		];

		return $rules;
	}

} #Cuenta