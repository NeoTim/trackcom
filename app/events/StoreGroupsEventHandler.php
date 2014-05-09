<?php

class StoreGroupsEventHandler {
 
    CONST EVENT = 'groups.store';
    CONST CHANNEL = 'groups.store';
 
    public function handle($data)
    {
        $redis = Redis::connection();
        $redis->publish(self::CHANNEL, $data);
    }
}