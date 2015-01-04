<?php

class Cartera extends \Eloquent {

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

	public function abonos()
	{
		return $this->hasMany('Abono');
	}

	public function saldo()
	{
		$saldo = $this->valor - $this->totalAbonado();

		return (float) $saldo;
	}

	public static function rules()
	{
		$rules = [
				'prefijo' 	=> 'required',
				'fisico' 		=> 'required|min:3',
				'valor'	=> 'required|min:0'
		];

		return $rules;
	}

	public function totalAbonado()
	{
		$abonado = $this->abonos()->sum('monto');

		return (float) $abonado;
	}

	public function tiempo_transcurrido($inicio, $fin)
	{
		$fecha = $this->created_at;
		$hoy = new DateTime();
		$intervalo = $fecha->diff($hoy);
		$diferencia = (int) $intervalo->format('%a');

		if ($diferencia >= $inicio && $diferencia <= $fin)
		{
			return true;
		}
		else
		{
			return false;
		}
	} #tiempo_transcurrido

} #Cartera