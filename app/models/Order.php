<?php

class Order extends Eloquent {
	protected $guarded = array();

	protected $softDelete = true;


	public static $rules = array(
		//'number' => 'required',
	);
	public function truck()
	{
		return $this->belongsTo('Truck');
	}
	public function entries()
	{
		return $this->hasMany('Entry');
	}
	public function customer()
	{
		return $this->belongsTo('Customer');
	}
	
	public function grp()
	{
		return $this->belongsTo('Grp');
	}
	public function driver()
	{
		return $this->belongsTo('Driver');
	}
	public function method()
	{
		return $this->belongsTo('Method');
	}
	protected static function boot() {
        parent::boot();

        static::deleting(function($order) { // before delete() method call this
            $order->entries()->delete();
            
             // do the rest of the cleanup...
        });
    }


    
}
