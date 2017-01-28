<?php 

//Container for dependency injection

Yii::$container->set(\frontend\service\SerializeInterface::class, \frontend\service\JsonSerialize::class);
Yii::$container->set('requestCrawler', [
    'class' => \frontend\service\RequestCrawler::class,
    'path' => '/files'
]);
