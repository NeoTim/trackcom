<?php

class Entry extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function order()
	{
		return $this->belongsTo('Order');
	}
	public function batch()
	{
		return $this->belongsTo('Batch');
	}
}
