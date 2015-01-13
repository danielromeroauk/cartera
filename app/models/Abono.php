<?php

class Abono extends \Eloquent {

	protected $fillable = [];
	protected $perPage = 12;

	public function cartera()
	{
		return $this->belongsTo('Cartera');
	}

	public static function rules()
	{
		$reglas = [
				'monto' => 'required|min:0',
				'forma_pago' => 'required'
		];

		return $reglas;
	}

	/***
	 * Retorna las formas de pago para rellenar un elemento SELECT de HTML
	 * @return array
	 */
	public static function  formas_pago_array()
	{
		$formas_pago_array = [
			'EFECTIVO' => 'EFECTIVO',
			'CHEQUE' => 'CHEQUE',
			'CONSIGNACIÓN' => 'CONSIGNACIÓN',
			'TRANSFERENCIA' => 'TRANSFERENCIA'
		];

		return $formas_pago_array;
	} #forma_pago

	public function user()
	{
		return $this->belongsTo('User');
	}

} #Abono