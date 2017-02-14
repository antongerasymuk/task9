<?php 

//Container for dependency injection

Yii::$container->set(\frontend\service\SerializeInterface::class, \frontend\service\JsonSerialize::class);
Yii::$container->set('requestCrawler', [
    'class' => \frontend\service\RequestCrawler::class,
    'path' => '/files',
    'events' => [ 'formfilewrite' => function ($event) {
    	var_dump($event);
    	exit;
            	                         Yii::trace('file using  serialization ' . get_class($event->sender->serialize) . ' have saved in ' . $event->sender->serialize->fileName);
                                    }
                ]
    ]
);


