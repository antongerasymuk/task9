<?php

namespace frontend\controllers;

use Yii;
use common\models\University;
use common\models\Teacher;
use common\models\Department;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TeacherController implements the CRUD actions for Country model.
 */
class TeacherController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'view', 'delete', 'update'],
                'denyCallback' => function ($rule, $action) {  throw new \Exception('You do not have access to this page'); },
                'rules' => [
                    [
                        'actions' => ['index','view'],
                        'allow' => true,
                        'roles' => ['user'],
                    ],
                    [
                        'actions' => ['create', 'delete', 'update'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * Lists all Teacher models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $teacher = Teacher::find()->with('department');
        

        //echo "<pre>";
        //var_dump( $teacher);
        //echo "</pre>";
        //exit;      
        $dataProvider = new ActiveDataProvider([
            'query' => $teacher,
        ]);
         
        
        return $this->render('index', [
            
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Teacher model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (!\Yii::$app->user->can('updateRows')) {
            throw new \Exception('Access denied');
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
                ]);
        }
    }

    /**
     * Creates a new Teacher model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Teacher();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Teacher model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model
            ]);
        }
    }

    /**
     * Deletes an existing Teacher model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
       $model = Teacher::findOne($id);
       
       $this->findModel($id)->delete();
       $model->unlinkAll('subjects', true);

       return $this->redirect(['index']);
    }

    /**
     * Finds the Teacher model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Country the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Teacher::find()->with('department')->where(['id' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
