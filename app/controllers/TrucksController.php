<?php

class TrucksController extends BaseController {

	/**
	 * Truck Repository
	 *
	 * @var Truck
	 */
	protected $truck;

	public function __construct(Truck $truck)
	{
		$this->truck = $truck;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$trucks = $this->truck->all();

		return View::make('trucks.index', compact('trucks'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('trucks.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Truck::$rules);

		if ($validation->passes())
		{
			$truck = $this->truck->create($input);
			return Response::json(array('dmethod_id' => $truck->dmethod_id));
			//return Redirect::route('trucks.index');
		}

		return Redirect::route('trucks.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$truck = $this->truck->findOrFail($id);

		return View::make('trucks.show', compact('truck'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$truck = $this->truck->find($id);

		if (is_null($truck))
		{
			return Redirect::route('trucks.index');
		}

		return View::make('trucks.edit', compact('truck'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Truck::$rules);

		if ($validation->passes())
		{
			$truck = $this->truck->find($id);
			$truck->update($input);

			return Response::json(array('dmethod_id' => $truck->dmethod_id, 'dmethod_name' => $truck->dmethod_name, 'driver' => $truck->driver ));
			//return Redirect::route('trucks.show', $id);
		}

			return Response::json(array('data' => 'did not work'));
		// return Redirect::route('trucks.edit', $id)
		// 	->withInput()
		// 	->withErrors($validation)
		// 	->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->truck->find($id)->delete();

		return Redirect::route('trucks.index');
	}

}
