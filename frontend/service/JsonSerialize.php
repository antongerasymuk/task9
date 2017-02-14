<?php

namespace frontend\service;

class JsonSerialize implements SerializeInterface
{
    public $path;
    public $component;
    public $fileName = null;
    const FORM_FILE_WRITE = 'formfilewrite';

    public function encodeAndSave(\yii\web\Request $request)
    {
        $array = $request->post(); 
        $encoded = json_encode($array);

        $this->fileName = __DIR__.$this->path.'/'.time().'.txt';
        $event = new \yii\base\Event;
        
        if (file_put_contents($this->fileName, $encoded , FILE_APPEND|LOCK_EX)) {
            $this->component->trigger(self::FORM_FILE_WRITE);
            return true;
        }
        return false;
        
    }
}
