<?php
 
 namespace frontend\service;
 
 use SerializerInterface;
 
 class RequestCrawlerServiceBuilder
 {
    public static function build($serializerConfig, $pathToSave)
    {
       
        return function () use ($serializerConfig, $pathToSave) {
        	
            $serializer = \Yii::createObject($serializerConfig);
            $requestCrawler = new \frontend\service\RequestCrawler($serializer, ['path' => $pathToSave]);
            return $requestCrawler;
        };
    }
}