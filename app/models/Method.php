<?php

class Method extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function orders()
	{
		return $this->hasMany('Order');
	}
	public function driver()
	{
		return $this->belongsTo('Driver');
	}
}
