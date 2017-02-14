<?php
namespace frontend\controllers;

//use yii\rest\ActiveController;
use yii\rest\Controller;

use yii\filters\auth\HttpBasicAuth;
use common\models\User;


class  TestController extends Controller {


    public function behaviors()
    {

        return [
            'contentNegotiator' => [
                'class' => 'yii\filters\ContentNegotiator',
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                ]
            ],
            'basicAuth' => [
                'class' => \yii\filters\auth\HttpBasicAuth::className(),

                'auth' => function ($username, $password) {
                        $user = User::find()->where(['username' => $username])->one();
                        if ($password) {
                            if ($user->validatePassword($password)) {
                                return $user;
                            }}

                        return null;
                    },
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['admin'],
                        'verbs' => ['GET', 'POST']
                    ],
                ],
            ],
        ];
    }

    public function actions() {
        $actions = parent::actions();

        unset(
        $actions[ 'create' ],
        $actions[ 'update' ],
        $actions[ 'delete' ],
        $actions[ 'options' ],
        $actions['view'],
        $actions['index']
        );
        return $actions;
    }

    protected function verbs(){
        return [
            'index'=>['GET','POST'],
        ];
    }


    public function actionIndex(){


        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $basearray = \common\models\Student::find()->asArray()->all();
        
        if (array_key_exists('admin',\Yii::$app->authManager->getRolesByUser(\Yii::$app->user->id))) {
        	foreach ($basearray as $key => $value) {
        		$basearray[$key]['fullname'] =  $basearray[$key]['name'].' '.$basearray[$key]['surname'];
        		unset($basearray[$key]['name'], $basearray[$key]['surname']);
        	}
        // This will return in JSON:
        return $basearray;
        }  

        throw new \yii\web\ForbiddenHttpException('You cannot access for Index action!'); 

        

    }
}