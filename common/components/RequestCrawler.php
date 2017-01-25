<?php
namespace common\components;

 
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\helpers\Json;
 
class RequestCrawler extends Component
{

    public $path = '';
    public $type = 'json';

    public function saveToFile($array)
    {
     
     $encoded = $array;
     switch ($this->type) {
          case 'json':
          $encoded = $this->getJson($array);
          break;
          case 'xml':
          $encoded = $this->getXML($array);
          break;
     }
       
     file_put_contents(Yii::getAlias('@common').'/upload/'.$path.time().'.txt', $encoded , FILE_APPEND|LOCK_EX);

     }
 
     private function getXML($array) {

        $xml = new \SimpleXMLElement('<root/>');
        array_walk_recursive($array, array ($xml, 'addChild'));
        return $xml->asXML();
     }

     private function getJson($array) {
          return Json::encode($array);
     }
}