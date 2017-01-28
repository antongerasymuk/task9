<?php
 
 namespace frontend\service;
 
 use SerializerInterface;
 
 class RequestCrawlerServiceBuilder
 {
     /**
      * @param $serializerConfig
      * @param $pathToSave
      * @return Closure
      * @internal param $serializerType
      * @internal param SerializerInterface $serializer
      * @internal param string $filePath
      * @internal param $ip
      */
    public static function build($serializerConfig, $pathToSave)
    {
       
        return function () use ($serializerConfig, $pathToSave) {
        	
            $serializer = \Yii::createObject($serializerConfig);
            $requestCrawler = new \frontend\service\RequestCrawler($serializer, ['path' => $pathToSave]);
            return $requestCrawler;
        };
    }
}