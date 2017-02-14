<?php
 
 namespace frontend\service;
 
 use SerializerInterface;
 
 class RequestCrawlerServiceBuilder
 {
    public static function build($serializerConfig, $pathToSave, $events)
    {
       
        return function () use ($serializerConfig, $pathToSave, $events) {
        	
            $serializer = \Yii::createObject($serializerConfig);
            $requestCrawler = new \frontend\service\RequestCrawler($serializer, ['path' => $pathToSave, 'events' => $events]);
            return $requestCrawler;
        };
    }
}