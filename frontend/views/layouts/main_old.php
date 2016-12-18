<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\caching\Cache;
use frontend\assets\AppAsset;

//$cache = Yii::$app->cache;
//$cache->set(1234,1234);
//Cache::set(1234,1234);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
   
    <div class="container" >
    <a class="btn btn-default" href="/university/">Universities</a>
    <a class="btn btn-default" href="/department/">Departments</a>
    <a class="btn btn-default" href="/homework/">Homework</a>
    <a class="btn btn-default" href="/subject/">Subject</a>
    <a class="btn btn-default" href="/teacher/">Teacher</a>
    <a class="btn btn-default" href="/student/">Student</a>
    <a class="btn btn-default" href="/site/migrate-up/">MakeDB</a>
    <p></p>
    

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
