<?php

class CarteraController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /cartera
	 *
	 * @return Response
	 */
	public function index($documento, $tercero_id)
	{
		$tercero = Tercero::find($tercero_id);
		$saldos = $this->saldos_en_intervalos($documento, $tercero_id);

		return View::make('carteras.listado', compact('documento', 'tercero', 'saldos'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /cartera/create
	 *
	 * @return Response
	 */
	public function create($documento, $tercero_id)
	{
		$tercero = Tercero::find($tercero_id);

		if ($documento == 'PAGAR')
		{
			return View::make('carteras.crear_pagar', compact('tercero'));
		}
		else if($documento == 'COBRAR')
		{
			return View::make('carteras.crear_cobrar', compact('tercero'));
		}
		else
		{
			return Redirect::route('home');
		}

	} #create

	/**
	 * Store a newly created resource in storage.
	 * POST /cartera
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only(['tercero_id', 'documento', 'prefijo', 'fisico', 'pedido', 'valor', 'notas', 'created_at',
													'vencimiento']);
		$validador = Validator::make($input, Cartera::rules());

		if ($validador->passes())
		{
			$cartera 							= new Cartera();
			$cartera->tercero_id 	= $input['tercero_id'];
			$cartera->documento 	= $input['documento'];
			$cartera->prefijo 		= $input['prefijo'];
			$cartera->fisico	 		= $input['fisico'];
			$cartera->pedido	 		= $input['pedido'];
			$cartera->valor	 			= $input['valor'];
			$cartera->notas	 			= $input['notas'];
			$cartera->created_at	= $input['created_at'];
			$cartera->vencimiento	= $input['vencimiento'];
			$cartera->user_id 		= Auth::user()->id;
			$cartera->save();

			return Redirect::route('mostrar_abonos', ['cartera_id' => $cartera->id]);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($validador);
		}
	}

	/**
	 * Display the specified resource.
	 * GET /cartera/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /cartera/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cartera = Cartera::find($id);
		$tercero = $cartera->tercero;

		return View::make('carteras.editar', compact('cartera', 'tercero'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /cartera/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$input = Input::only(['id', 'prefijo', 'fisico', 'pedido', 'valor', 'notas', 'created_at', 'vencimiento']);

		$validador = Validator::make($input, Cartera::rules());

		if ($validador->passes())
		{
			$cartera 							= Cartera::find($input['id']);
			$cartera->prefijo 		= $input['prefijo'];
			$cartera->fisico 			= $input['fisico'];
			$cartera->pedido 			= $input['pedido'];
			$cartera->valor				= $input['valor'];
			$cartera->notas				= $input['notas'];
			$cartera->created_at	= $input['created_at'];
			$cartera->vencimiento	= $input['vencimiento'];
			$cartera->user_id 		= Auth::user()->id;
			$cartera->save();

			return Redirect::route('mostrar_abonos', ['cartera_id' => $cartera->id]);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($validador);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /cartera/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/***
	 * Devuelve un array con los saldos de $documento (PAGAR/COBRAR) de un tercero en los rangos
	 * $saldos = [
	 * '0a30' 		=> 0,
	 * '31a60' 		=> 0,
	 * '61a90' 		=> 0,
	 * '91a120' 	=> 0,
	 * 'mas120' 	=> 0
	 * ];
	 * @param $documento
	 * @param $tercero_id
	 * @return array
	 */
	private function saldos_en_intervalos($documento, $tercero_id, $todos = false, $id_cartera = null)
	{
		$saldos = [
			'sum_0a30' 			=> 0,
			'sum_31a60' 		=> 0,
			'sum_61a90' 		=> 0,
			'sum_91a120' 		=> 0,
			'sum_mas120' 		=> 0,
			'sum_abonado' 	=> 0,
			'sum_saldo'			=> 0
		];

		$carteras = Cartera::with('tercero')->where('documento', '=', $documento)->where('tercero_id', '=', $tercero_id);

		if (! is_null($id_cartera))
		{
			$carteras->where('fisico', 'LIKE', '%'. $id_cartera .'%');
		}

		$carteras = $carteras->get();

		foreach ($carteras as $cartera)
		{
			if (! $todos)
			{
				if ($cartera->saldo() == 0)
				{
					continue;
				}
			}

			$saldos[$cartera->id] = $cartera->toArray();
			$saldos[$cartera->id]['abonado'] = $cartera->totalAbonado();
			$saldos[$cartera->id]['saldo'] = $cartera->saldo();

			if ($cartera->tiempo_transcurrido(0,30))
			{
				$saldos[$cartera->id]['0a30'] = $cartera->valor;
				$saldos['sum_0a30'] += $cartera->valor;
			}
			else if($cartera->tiempo_transcurrido(31,60))
			{
				$saldos[$cartera->id]['31a60'] = $cartera->valor;
				$saldos['sum_31a60'] += $cartera->valor;
			}
			else if($cartera->tiempo_transcurrido(61,90))
			{
				$saldos[$cartera->id]['61a90'] = $cartera->valor;
				$saldos['sum_61a90'] += $cartera->valor;
			}
			else if($cartera->tiempo_transcurrido(91,120))
			{
				$saldos[$cartera->id]['91a120'] = $cartera->valor;
				$saldos['sum_91a120'] += $cartera->valor;
			}
			else if($cartera->tiempo_transcurrido(121,3650))
			{
				$saldos[$cartera->id]['mas120'] = $cartera->valor;
				$saldos['sum_mas120'] += $cartera->valor;
			}

			$saldos['sum_abonado'] += $cartera->totalAbonado();
			$saldos['sum_saldo'] += $cartera->saldo();

		} #foreach

		return $saldos;

	} #saldos_en_intervalos

	public function general($documento)
	{
		$saldos = [
			'sum_0a30' => 0,
			'sum_31a60' => 0,
			'sum_61a90' => 0,
			'sum_91a120' => 0,
			'sum_mas120' => 0,
			'sum_abonado' => 0,
			'sum_saldo' => 0
		];

		$carteras = Cartera::with('tercero', 'abonos')
				->where('documento', '=', $documento)
				->get();

		foreach ($carteras as $cartera)
		{
			if ($cartera->saldo() == 0)
			{
				continue;
			}

			// Si existe el nombre existen los demás datos asociados al tercero
			if (! isset($saldos[$cartera->tercero->id]['nombre']))
			{
				$saldos[$cartera->tercero->id]['nombre'] = $cartera->tercero->nombre;
				$saldos[$cartera->tercero->id]['nit'] = $cartera->tercero->nit;
			}

			if ($cartera->tiempo_transcurrido(0,30))
			{
				if (isset($saldos[$cartera->tercero->id]['0a30']))
				{
					$saldos[$cartera->tercero->id]['0a30'] +=  $cartera->valor;
				}
				else
				{
					$saldos[$cartera->tercero->id]['0a30'] =  $cartera->valor;
				}
				$saldos['sum_0a30'] += $cartera->valor;
			}
			else if($cartera->tiempo_transcurrido(31,60))
			{
				if (isset($saldos[$cartera->tercero->id]['31a60']))
				{
					$saldos[$cartera->tercero->id]['31a60'] += $cartera->valor;
				}
				else
				{
					$saldos[$cartera->tercero->id]['31a60'] = $cartera->valor;
				}
				$saldos['sum_31a60'] += $cartera->valor;
			}
			else if($cartera->tiempo_transcurrido(61,90))
			{
				if (isset($saldos[$cartera->tercero->id]['61a90']))
				{
					$saldos[$cartera->tercero->id]['61a90'] += $cartera->valor;
				}
				else
				{
					$saldos[$cartera->tercero->id]['61a90'] = $cartera->valor;
				}
				$saldos['sum_61a90'] += $cartera->valor;
			}
			else if($cartera->tiempo_transcurrido(91,120))
			{
				if (isset($saldos[$cartera->tercero->id]['91a120']))
				{
					$saldos[$cartera->tercero->id]['91a120'] += $cartera->valor;
				}
				else
				{
					$saldos[$cartera->tercero->id]['91a120'] = $cartera->valor;
				}
				$saldos['sum_91a120'] += $cartera->valor;
			}
			else if($cartera->tiempo_transcurrido(121,3650))
			{
				if (isset($saldos[$cartera->tercero->id]['mas120']))
				{
					$saldos[$cartera->tercero->id]['mas120'] += $cartera->valor;
				}
				else
				{
					$saldos[$cartera->tercero->id]['mas120'] = $cartera->valor;
				}
				$saldos['sum_mas120'] += $cartera->valor;
			}

			// Esto se ejecuta para todos los registros con saldo mayor a cero.
			if (isset($saldos[$cartera->tercero->id]['saldo']))
			{
				$saldos[$cartera->tercero->id]['saldo'] += $cartera->saldo();
			}
			else
			{
				$saldos[$cartera->tercero->id]['saldo'] = $cartera->saldo();
			}
			$saldos['sum_saldo'] += $cartera->saldo();

			// Esto se ejecuta para todos los registros con saldo mayor a cero.
			if (isset($saldos[$cartera->tercero->id]['abonado']))
			{
				$saldos[$cartera->tercero->id]['abonado'] += $cartera->totalAbonado();
			}
			else
			{
				$saldos[$cartera->tercero->id]['abonado'] = $cartera->totalAbonado();
			}
			$saldos['sum_abonado'] += $cartera->totalAbonado();

		} #foreach

		return View::make('carteras.general', compact('documento', 'saldos'));

	} #general

	public function buscar($documento, $tercero_id)
	{
		$input = Input::all();
		$todos = ($input['todos'] == 'false') ? false : true;
		$buscar = $input['buscar'];
		$tercero = Tercero::find($tercero_id);
		$saldos = $this->saldos_en_intervalos($documento, $tercero_id, $todos, $buscar);

		Session::flash('mensaje', 'Mostrando documentos físicos que contienen <strong>'. $buscar .'</strong>');

		return View::make('carteras.listado', compact('documento', 'tercero', 'saldos'));
	} #buscar

	public function vencimientos($documento)
	{
		$carteras = Cartera::where('documento', '=', $documento)->orderBy('vencimiento', 'ASC')->paginate(50);

		return View::make('carteras.vencimientos', compact('documento', 'carteras'));
	} #vencimientos


} #CarteraController