<?php

class UpdateEntriesStatusEventHandler {
 
    CONST EVENT = 'entries.status';
    CONST CHANNEL = 'entries.status';
 
    public function handle($data)
    {
        $redis = Redis::connection();
        $redis->publish(self::CHANNEL, $data);
    }
}