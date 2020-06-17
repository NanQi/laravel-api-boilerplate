<?php


namespace App\Hope;


use Illuminate\Redis\Connections\Connection;
use Illuminate\Redis\Connections\PhpRedisConnection;
use Illuminate\Support\Facades\Redis;

class Hope
{
    /**
     * 获取Redis
     * @param $name
     * @return Connection|PhpRedisConnection
     */
    public static function getRedis($name = null)
    {
        $redis =  Redis::connection($name);
        return $redis;
    }
}
