<?php

class UpdateDriversEventHandler {
 
    CONST EVENT = 'drivers.update';
    CONST CHANNEL = 'drivers.update';
 
    public function handle($data)
    {
        $redis = Redis::connection();
        $redis->publish(self::CHANNEL, $data);
    }
}