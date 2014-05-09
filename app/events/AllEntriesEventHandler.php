<?php

class AllEntriesEventHandler {
 
    CONST EVENT = 'entries.all';
    CONST CHANNEL = 'entries.all';
 
    public function handle($data)
    {
        $redis = Redis::connection();
        $redis->publish(self::CHANNEL, $data);
    }
}
