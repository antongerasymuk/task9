<?php
namespace frontend;

class JsonSerialize implements SerializeInterface
{
    public function encode($array)
    {
        return json_encode($array);
    }

    public function decode($array)
    {
        return json_decode($array);
    }

    public function saveFile($encoded, $path) 
    {
        file_put_contents(__DIR__.$path.'/'.time().'.txt', $encoded , FILE_APPEND|LOCK_EX);
    }
}
