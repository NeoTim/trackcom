<?php

class DriversController extends BaseController {

	/**
	 * Driver Repository
	 *
	 * @var Driver
	 */
	protected $driver;

	public function __construct(Driver $driver)
	{
		$this->driver = $driver;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$drivers = $this->driver->with('orders')->get();

		return $drivers->toArray();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Driver::$rules);

		if ($validation->passes())
		{
			$driver = $this->driver->create($input);
			return Response::json(array('id' => $driver->id, 'dmethod_id' => $driver->dmethod_id, 'dmethod_name' => $driver->dmethod_name, 'driver' => $driver->driver,  'm_id' => $driver->m_id ));
			//return Redirect::route('drivers.index');
		}
		return Response::json(array('data' => 'did not work'));
		// return Redirect::route('drivers.create')
		// 	->withInput()
		// 	->withErrors($validation)
		// 	->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$drivers = $this->driver->all();
		$array = array('drivers' => $drivers);
		return $drivers->toArray();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		$validation = Validator::make($input, Driver::$rules);
		
		$driver = $this->driver->find($id);
		
		$drivers = $this->driver->all();

		if ($validation->passes())
		{
			$driver->update($input);
			
			Event::fire(UpdateDriversEventHandler::EVENT, array($driver));
			return $driver->toArray();
			/*return Response::json(array('id' => $driver->id, 'dmethod_id' => $driver->dmethod_id, 'dmethod_name' => $driver->dmethod_name, 'driver' => $driver->driver, 'number' => $driver->number ));
*/			//return Redirect::route('drivers.show', $id);
		}

			return Response::json(array('error' => 'Please make sure the driver number is not already Selected', 'id' => $driver->id));
		// return Redirect::route('drivers.edit', $id)
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
		$driver = $this->driver->find($id);
		$driver->delete();

		return Response::json(array('data' => 'Driver was removed'));
	}

}
