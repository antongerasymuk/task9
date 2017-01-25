<?php 

//Container

 Yii::$container->set(\frontend\SerializeInterface::class, \frontend\JsonSerialize::class);


Yii::$container->set('requestCrawler', [
     'class' => \frontend\RequestCrawler::class,
     'serialize' => new \frontend\JsonSerialize(),
     'path' => '/upload/'
 ]);
