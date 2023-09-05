<?php

namespace backend\controllers;

use Yii;

use app\models\Semana;
use app\models\search\SearchSemana;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;



/**
 * SemanaController implements the CRUD actions for Semana model.
 */
class SemanaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Semana models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchSemana();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Semana model.
     * @param int $id_semana Id Semana
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_semana)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_semana),
        ]);
    }

    /**
     * Creates a new Semana model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Semana();

        $id_pat = Yii::$app->request->get('id_pat');

        $model->pat_id_pat = $id_pat;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_semana' => $model->id_semana]);
            }
        } else {
            $model->loadDefaultValues();
        }

        

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Semana model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_semana Id Semana
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_semana)
    {
        $model = $this->findModel($id_semana);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_semana' => $model->id_semana]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Semana model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_semana Id Semana
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_semana)
    {
        $this->findModel($id_semana)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Semana model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_semana Id Semana
     * @return Semana the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_semana)
    {
        if (($model = Semana::findOne(['id_semana' => $id_semana])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
