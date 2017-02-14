<?php

namespace console\controllers;
use Yii;
use yii\base\Security;
use yii\console\Controller;
use yii\helpers\Console;
use common\models\Student;

class HelloController extends Controller
{
    public $message;
    
    public function options()
    {
        return ['message'];
    }
    
    public function optionAliases()
    {
        return ['m' => 'message'];
    }
    
    public function actionIndex()
    {
       $result = $this->prompt("Activate loading: ");
       if($result=="yes"){

           Console::startProgress(0,100);
           foreach(range(0,10) as $v){

            usleep(100);
            $model = new Student();
            $model->department_id = '1';
            $model->name = Yii::$app->getSecurity()->generateRandomString(10); 
            $model->telephone = Yii::$app->getSecurity()->generateRandomString(10); 
            $model->email = 'example@mail.com';
            $model->save();

            if ($model->save()) {
               Console::updateProgress($v,100);
            }

       }
       Console::endProgress("end".PHP_EOL);
   }
   else {
       echo 'error in entering commant!';
   }

   return parent::EXIT_CODE_NORMAL;

}
}

