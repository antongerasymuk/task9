<?php
namespace frontend\service;

class JsonSerialize implements SerializeInterface
{
    public $path;
    public function encodeAndSave(\yii\web\Request $request)
    {
        $array = $request->post(); 
        $encoded = json_encode($array);
        return file_put_contents(__DIR__.$this->path.'/'.time().'.txt', $encoded , FILE_APPEND|LOCK_EX);
    }
}
