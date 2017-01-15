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

    public $js = [];
    public $depends = [
    'yii\bootstrap\BootstrapAsset'];
}
