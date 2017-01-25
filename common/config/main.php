<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
     'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',

        ]
    ],
    /*'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*',
            'some-controller/some-action',
            
        ],
        
    ],*/
    'components' => [
        'requestcrawler' => [
            'class' => 'common\components\RequestCrawler',
            'path' => '',
            'type' => 'xml'
            ],
        
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
         'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    

    'authClientCollection' => [
        'class' => 'yii\authclient\Collection',
        'clients' => [
            'facebook' => [
                'class' => 'yii\authclient\clients\Facebook',
                'clientId' => '349268725442351',
                'clientSecret' => '1776833fda10d1d9088a087dd9daeeca',
            ],
        ],
    ],
    ],
];
