<?php

use Cox\Storage\Notification\NotificationRepositoryInterface as Notification;

class NotificationsController extends BaseController {

	protected $notification;

	public function __construct(Notification $notification)
	{
		$this->notification = $notification;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('notifications.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('notifications.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$notify = $this->notification->store(Input::all());

		if($notify['success'])
		{

			return Response::json(array('title' => $notify['title'], 'subject' => $notify['subject'], 'body' => $notify['body'], 'color' => $notify['color'], 'label' => $notify['label']));
			//return $notify;

		}else{

			return $notify;

		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
        return $this->notification->all();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('notifications.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
