<?php
namespace frontend;
use SimpleXMLElement;

class XmlSerialize implements SerializeInterface
{

   public function encode($data)
   {
       $xml = new SimpleXMLElement('<root/>');
       array_walk_recursive($data, array($xml, 'addChild'));
       return $xml->asXML();
   }

   public function decode($data)
   {
       $xml = simplexml_load_string($data);
       $json = json_encode($xml);
       return json_decode($json, true);
   }

   public function saveFile($encoded, $path) 
   {
       file_put_contents(__DIR__.$path.'/'.time().'.txt', $encoded , FILE_APPEND|LOCK_EX);
   }
}
