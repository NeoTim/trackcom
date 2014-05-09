<?php

class StoreBatchesEventHandler {
 
    CONST EVENT = 'batches.store';
    CONST CHANNEL = 'batches.store';
 
    public function handle($data)
    {
        $redis = Redis::connection();
        $redis->publish(self::CHANNEL, $data);
    }
}
