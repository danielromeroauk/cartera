<?php

class CuentaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /cuenta
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /cuenta/create
	 *
	 * @return Response
	 */
	public function create($id_tercero)
	{
		$tercero = Tercero::find($id_tercero);

		return View::make('cuentas.crear', compact('tercero'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /cuenta
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only(['tercero_id', 'banco', 'tipo', 'numero']);
		$validador = Validator::make($input, Cuenta::rules());

		if ($validador->passes())
		{
			$cuenta 						= new Cuenta();
			$cuenta->tercero_id = $input['tercero_id'];
			$cuenta->banco 			= $input['banco'];
			$cuenta->tipo 			= $input['tipo'];
			$cuenta->numero 		= $input['numero'];
			$cuenta->user_id 		= Auth::user()->id;
			$cuenta->save();

			return Redirect::route('mostrar_tercero', ['id' => $input['tercero_id']]);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($validador);
		}
	} #store

	/**
	 * Display the specified resource.
	 * GET /cuenta/{id}
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
	 * GET /cuenta/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cuenta = Cuenta::find($id);
		$tercero = $cuenta->tercero;

		return View::make('cuentas.editar', compact('cuenta', 'tercero'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /cuenta/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$input = Input::only(['id', 'banco', 'tipo', 'numero']);
		$validador = Validator::make($input, Cuenta::rules());

		if ($validador->passes())
		{
			$cuenta 						= Cuenta::find($input['id']);
			$cuenta->banco 			= $input['banco'];
			$cuenta->tipo 			= $input['tipo'];
			$cuenta->numero 		= $input['numero'];
			$cuenta->user_id 		= Auth::user()->id;
			$cuenta->save();

			return Redirect::route('mostrar_tercero', ['id' => $cuenta->tercero->id]);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($validador);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /cuenta/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}