<?php
namespace frontend\service;
use SimpleXMLElement;

class XmlSerialize implements SerializeInterface
{
    public $path;

    public function encodeAndSave(\yii\web\Request $request)
    {
        $array = $request->post();
        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($array, array($xml, 'addChild'));
        $encoded = $xml->asXML();
        return file_put_contents(__DIR__.$this->path.'/'.time().'.txt', $encoded , FILE_APPEND|LOCK_EX);       
    }    
}
