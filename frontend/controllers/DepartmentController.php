<?php

namespace frontend\controllers;

use Yii;
use common\models\Department;
use common\models\Student;
use common\models\Teachers;
use common\models\Subjects;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * DepartmentController implements the CRUD actions for Country model.
 */
class DepartmentController extends Controller
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
     * Lists all Department models.
     * @return mixed
     */
    public function actionIndex()
    {
                
       
        
        $dataProvider = new ActiveDataProvider([
            'query' => Department::find(),
        ]);
        
        return $this->render('index', [
            
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Department model.
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
     * Creates a new Department model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Department();
     
        $request = Yii::$app->request;

        
        if ($model->load($request->post()) && $model->save()) {
            //$requestCrawler = Yii::$app->get('requestCrawler')->serialize->encodeAndSave($request);
            //var_dump($requestCrawler);

            $requestCrawler = Yii::$container->get('requestCrawler')->serialize->encodeAndSave($request);
            //var_dump($requestCrawler);
            //exit;

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Department model.
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
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Department model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $modelSubject = Subject::find()->where(['department_id' => $id])->all();
        $modelTeacher = Teacher::find()->where(['department_id' => $id])->all();
        $modelStudent = Student::find()->where(['department_id' => $id])->all();

        foreach ($modelSubject as $subject) {
           $subject->department_id = NULL;
           $subject->save(false);
        }
        foreach ($modelTeacher as $teacher) {
           $teacher->department_id = NULL;
           $teacher->save(false);
        }
        foreach ($modelStudent as $student) {
           $student->department_id = NULL;
           $student->save(false);
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
   }

    /**
     * Finds the Department model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Country the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Department::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
