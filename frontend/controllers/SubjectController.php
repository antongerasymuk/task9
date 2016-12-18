<?php

namespace frontend\controllers;

use Yii;
use common\models\Subject;
use common\models\Teacher;
//use app\models\CountrySearch;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CountryController implements the CRUD actions for Country model.
 */
class SubjectController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Subject models.
     * @return mixed
     */
    public function actionIndex()
    {
         //$query = Tour::find();
    // Important: lets join the query with our previously mentioned relations
    // I do not make any other configuration like aliases or whatever, feel free
    // to investigate that your self
    //$query->joinWith(['city', 'country']);


        //$subject = Subject::find()->select(['subjects.id', 'subjects.title', 'departments.name'])->joinWith('department');
        //$subject = Subject::find()->joinWith('department');
        $subject = Subject::find()->with('department');

        
          

            
        $dataProvider = new ActiveDataProvider([
            'query' => $subject,
        ]);


        //echo "<pre>";
        //var_dump( $dataProvider);
        //echo "</pre>";
        //exit;  
        
        return $this->render('index', [
            
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Subject model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Subject model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Subject();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (!empty($model->teacherIds)) {
                        foreach ($model->teacherIds as $id) {
                            $model->link('teachers', Teacher::findOne(['id' => $id]));
                        }
                    }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        
        $model->teachersIds = ArrayHelper::map($model
            ->getTeacher()
            ->select('id')
            ->asArray()
            ->all(), 'id', 'id');
    }

    /**
     * Updates an existing Subject model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (!empty($model->teacherIds)) {
                foreach ($model->teacherIds as $id) {
                    $model->link('teachers', Teacher::findOne(['id' => $id]));
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model
            ]);
        }

        $model->teachersIds = ArrayHelper::map($model
            ->getTeacher()
            ->select('id')
            ->asArray()
            ->all(), 'id', 'id');
    }

    /**
     * Deletes an existing Subject model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
       
       $model = Subject::findOne($id);
       $modelHomework = Homework::find()->where(['department_id' => $id])->all();
       foreach ($modelHomework as $homework) {
           $homework->subject_id = NULL;
           $homework->save(false);
        }
        $this->findModel($id)->delete();
        $model->unlinkAll('teachers', true);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Subject model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Country the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Subject::find()->with('department')->where(['id' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
