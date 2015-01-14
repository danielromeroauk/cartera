<?php

class AbonoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /abono
	 *
	 * @return Response
	 */
	public function index($cartera_id)
	{
		$cartera = Cartera::find($cartera_id);
		$tercero = $cartera->tercero;

		return View::make('abonos.mostrar', compact('cartera', 'tercero'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /abono/create
	 *
	 * @return Response
	 */
	public function create($cartera_id)
	{
		$cartera = Cartera::find($cartera_id);
		$tercero = $cartera->tercero;
		$max = $cartera->saldo();

		return View::make('abonos.crear', compact('cartera', 'tercero', 'max'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /abono
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only(['cartera_id', 'forma_pago', 'cuenta_id', 'monto', 'notas', 'created_at', 'comprobante']);
		$validador = Validator::make($input, Abono::rules());

		if ($validador->passes())
		{
			$abono 							= new Abono();
			$abono->cartera_id	= $input['cartera_id'];
			$abono->forma_pago	= $input['forma_pago'];
			$abono->cuenta_id		= ($input['cuenta_id'] == 'NULL') ? null : $input['cuenta_id'];
			$abono->monto				= $input['monto'];
			$abono->notas				= $input['notas'];
			$abono->created_at	= $input['created_at'];
			$abono->comprobante	= $input['comprobante'];
			$abono->user_id 		= Auth::user()->id;
			$abono->save();

			return Redirect::route('mostrar_abonos', ['cartera_id' => $input['cartera_id']]);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($validador);
		}
	}

	/**
	 * Display the specified resource.
	 * GET /abono/{id}
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
	 * GET /abono/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$abono = Abono::find($id);
		$tercero = $abono->cartera->tercero;
		$max = $abono->cartera->saldo() + $abono->monto;

		return View::make('abonos.editar', compact('abono', 'tercero', 'max'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /abono/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$input = Input::only(['id', 'forma_pago', 'cuenta_id', 'monto', 'notas', 'created_at', 'comprobante']);
		$validador = Validator::make($input, Abono::rules());

		if ($validador->passes())
		{
			$abono 							= Abono::find($input['id']);
			$abono->forma_pago	= $input['forma_pago'];
			$abono->cuenta_id		= ($input['cuenta_id'] == 'NULL') ? null : $input['cuenta_id'];
			$abono->monto				= $input['monto'];
			$abono->notas				= $input['notas'];
			$abono->created_at	= $input['created_at'];
			$abono->comprobante	= $input['comprobante'];
			$abono->user_id 		= Auth::user()->id;
			$abono->save();

			return Redirect::route('mostrar_abonos', ['cartera_id' => $abono->cartera->id ]);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($validador);
		}
	} #update

	/**
	 * Remove the specified resource from storage.
	 * DELETE /abono/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

} #AbonoController