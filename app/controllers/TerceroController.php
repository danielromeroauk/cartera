<?php

class TerceroController extends \BaseController {

	public function index()
	{
		return $this->listado();
	} #index

	public function create()
	{
		return View::make('terceros.crear');
	}

	public function store()
	{
		$input = Input::only(['nit', 'nombre', 'direccion', 'telefono', 'email', 'notas']);
		$validador = Validator::make($input, Tercero::rulesCreate());

		if ($validador->passes())
		{
			$tercero = new Tercero();
			$tercero->nit = $input['nit'];
			$tercero->nombre = $input['nombre'];
			$tercero->direccion = $input['direccion'];
			$tercero->telefono = $input['telefono'];
			$tercero->email = $input['email'];
			$tercero->estado = 'ACTIVO';
			$tercero->notas = $input['notas'];
			$tercero->user_id = Auth::user()->id;
			$tercero->save();

			return Redirect::route('mostrar_tercero', ['id' => $tercero->id]);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($validador);
		}
	} #store

	public function show($id)
	{
		$tercero = Tercero::find($id);

		return View::make('terceros.mostrar', compact('tercero'));
	}

	public function edit($id)
	{
		$tercero = Tercero::find($id);

		return View::make('terceros.editar',compact('tercero'));
	}

	public function update()
	{
		$input = Input::only(['id', 'nit', 'nombre', 'direccion', 'telefono', 'email', 'notas']);
		$validador = Validator::make($input, Tercero::rulesUpdate($input['id']));

		if ($validador->passes())
		{
			$tercero = Tercero::find($input['id']);
			$tercero->nit = $input['nit'];
			$tercero->nombre = $input['nombre'];
			$tercero->direccion = $input['direccion'];
			$tercero->telefono = $input['telefono'];
			$tercero->email = $input['email'];
			$tercero->estado = 'ACTIVO';
			$tercero->notas = $input['notas'];
			$tercero->user_id = Auth::user()->id;
			$tercero->save();

			return Redirect::route('mostrar_tercero', ['id' => $tercero->id]);
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($validador);
		}
	} #update

	public function buscar()
	{
		$input = Input::only(['campo', 'buscar']);

		$palabras = explode(' ', $input['buscar']);

		$terceros = Tercero::select(['id', 'nit', 'nombre']);

		foreach ($palabras as $palabra)
		{
			$terceros->where($input['campo'], 'like', '%'. $palabra .'%');
		}

		$terceros = $terceros->orderBy('nombre', 'ASC')->paginate();

		Session::flash('mensaje', 'Resultados con '. $input['campo'] .' <em>'. $input['buscar'] .'</em>');

		return $this->listado($terceros);
	} #buscar

	public function listado($terceros = null)
	{
		if (is_null($terceros))
		{
			$terceros = Tercero::orderBy('nombre', 'ASC')->paginate();
		}

		return View::make('terceros.listado', compact('terceros'));
	} #listado

} #TerceroController