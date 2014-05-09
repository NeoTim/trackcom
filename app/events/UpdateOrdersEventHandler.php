<?php

class UpdateOrdersEventHandler {
 
    CONST EVENT = 'orders.update';
    CONST CHANNEL = 'orders.update';
 
    public function handle($data)
    {
        $redis = Redis::connection();
        $redis->publish(self::CHANNEL, $data);
    }
}