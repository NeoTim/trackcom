<?php

class UpdateGroupsEventHandler {
 
    CONST EVENT = 'groups.update';
    CONST CHANNEL = 'groups.update';
 
    public function handle($data)
    {
        $redis = Redis::connection();
        $redis->publish(self::CHANNEL, $data);
    }
}