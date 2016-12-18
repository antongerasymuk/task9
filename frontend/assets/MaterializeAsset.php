<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MaterializeAsset extends AssetBundle
{
    
    public $basePath = '@webroot/themes/materialaze';
    public $baseUrl = '@web/themes/materialize';
    
    public $css = [
        'css/materialize.css',
        'css/style.css'
        //'css/site.css',
    ];

    public $js = [
        'https://code.jquery.com/jquery-2.1.1.min.js'
    ];
    public $depends = [
       // 'yii\web\YiiAsset',
       // 'yii\bootstrap\BootstrapAsset',
    ];
}
