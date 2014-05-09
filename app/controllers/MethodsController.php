<?php

class MethodsController extends BaseController {

	/**
	 * Method Repository
	 *
	 * @var Method
	 */
	protected $method;

	public function __construct(Method $method)
	{
		$this->method = $method;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$methods = $this->method->all();

		return $methods->toArray();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('methods.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Method::$rules);

		if ($validation->passes())
		{
			$method = $this->method->create($input);					
		}
		return Response::json(array('data' => 'did not work'));		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$methods = $this->method->all();
		$array = array('methods' => $methods);
		return $methods->toArray();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$method = $this->method->find($id);

		if (!is_null($method))
		{
			return $method;			
		} else {
			return Response::make('Method Not found', 404);
		}

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{		
		$validation = Validator::make(Input::all(), Method::$rules);
		
		$method = $this->method->find($id);

		if ($validation->passes())
		{
			$method = $this->method->find($id);

			$method->update(Input::all());
			Event::fire(UpdateMethodsEventHandler::EVENT, array($method));
			//Event::fire(UpdateMethodsEventHandler::EVENT, array($method));
			return Response::json(array('id' => $method->id, 'm_id' => $method->m_id, 'driver' => $method->driver, 'driver_id' => $method->driver_id, 'title' => $method->title, 'status' => $method->status, 'bgColor' =>$method->bgColor ));
			//return Redirect::route('methods.show', $id);
		}

			return Response::json(array('error' => 'Please make sure the method number is not already Selected', 'id' => $method->id));		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$method = $this->method->find($id);
		$method->delete();

		return Response::json(array('data' => 'Method was removed'));
	}

}
