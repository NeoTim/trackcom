<?php

class UpdateBatchesEventHandler {
 
    CONST EVENT = 'batches.update';
    CONST CHANNEL = 'batches.update';
 
    public function handle($data)
    {
        $redis = Redis::connection();
        $redis->publish(self::CHANNEL, $data);
    }
}
