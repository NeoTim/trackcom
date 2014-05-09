<?php

class UpdateMethodsEventHandler {
 
    CONST EVENT = 'methods.update';
    CONST CHANNEL = 'methods.update';
 
    public function handle($data)
    {
        $redis = Redis::connection();
        $redis->publish(self::CHANNEL, $data);
    }
}