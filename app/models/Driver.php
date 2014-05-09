<?php

class Driver extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function orders()
	{
		return $this->hasMany('Order');
	}
	public function methods()
	{
		return $this->hasMany('Method');
	}
}
