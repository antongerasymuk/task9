<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use frontend\assets\MaterializeAsset;
use \common\widgets\InformColumn;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use \yii\web\YiiAsset;

/**
 * @var $this \yii\base\View
 * @var $content string
 */
// $this->registerAssetBundle('app');
MaterializeAsset::register($this);
$theme = $this->theme;
?>
<?php $this->beginPage(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  
  <title><?php echo Html::encode($this->title); ?></title>
  <?php $this->head(); ?>
	
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  
</head>
<body>
  <?php $this->beginBody() ?>

  <nav class="light-blue lighten-1" role="navigation">
    <div class="container">
      <div class="nav-wrapper"><a id="logo-container" href="#" class="brand-logo"><?php echo Html::encode(\Yii::$app->name); ?></a>
       <?php
     
       $menuItems = [];
       if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        $menuItems[] =  ['label' => 'Signup', 'url' => ['site/signup']];
      } else {
        $menuItems = [
          ['label' => 'Universities', 'url' => ['university/']],
          ['label' => 'Departments', 'url' => ['department/']],
          ['label' => 'Homework', 'url' => ['homework/']],
          ['label' => 'Subject', 'url' => ['subject/']],
          ['label' => 'Teacher', 'url' => ['teacher/']],
          ['label' => 'Student', 'url' => ['student/']],
          ['label' => 'MakeDB', 'url' => ['site/migrate-up/']],
          ['label' => 'Logout (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout']
          //'template' => '<a href="{url}" data-method="POST">{label}</a>',     

                ],
          //['label' => 'Logout (' . Yii::$app->user->identity->username .')', 'url'=> ['//user/security/logout'],'linkOptions' => ['data-method' => 'post']],

          //'<li>' . Html::beginForm(['/site/logout'], 'post') . Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')',
          //      ['class' => 'btn btn-link logout'] ) . Html::endForm() . '</li>' 
          ];
        }

        //'<li>'
        //. Html::beginForm(['/site/logout'], 'post')
        //. Html::submitButton(
        //  'Logout (' . Yii::$app->user->identity->username . ')',
       //   ['class' => 'btn btn-link logout']
       //   )
       // . Html::endForm()
       // . '</li>';
     // }//
      //echo Nav::widget([
      //  'options' => ['class' => 'navbar-nav navbar-right'],
      //  'items' => $menuItems,
      //  ]);
      //NavBar::end();
      ?>

        <?php
						echo Menu::widget([
						    'options' => ['id' => "nav-mobile", 'class' => 'right side-nav'],
						    'items' => $menuItems,
						]);
					?>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      </div>
    </div>
  </nav>
  

  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12 m12">
          <?php echo $content; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <?= InformColumn::widget([
        'title' => 'Speeds up development',
        'content' => 'We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.',
        'mainImage' => 'flash'
        ]);?>

        <?= InformColumn::widget([
        'title' => 'User Experience Focused',
        'content' => 'By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.',
        'mainImage' => 'social'
        ]);?>

        <?= InformColumn::widget([
        'title' => 'Easy to work with',
        'content' => 'We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.',
        'mainImage' => 'settings'
        ]);?>
      </div>
    </div>
    <br><br>

    <div class="section">

    </div>
  </div>

  <footer class="orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>  

  <!--  Scripts-->
  <?php $this->registerJsFile($theme->getUrl('/js/init.js'), ['depends' => [\yii\web\JqueryAsset::className()]]); ?>
  <?php $this->registerJsFile($theme->getUrl('/js/materialize.js'), ['depends' => [frontend\assets\MaterializeAsset::className()]]); ?>
  
   
  <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage(); ?>