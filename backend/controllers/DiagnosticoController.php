<?php

namespace backend\controllers;

use app\models\Diagnostico;
use app\models\Motivo;
use app\models\search\DiagnosticoSearch;
use app\models\search\PerformanceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DiagnosticoController implements the CRUD actions for Diagnostico model.
 */
class DiagnosticoController extends Controller
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
     * Lists all Diagnostico models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DiagnosticoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $searchPerformance = new PerformanceSearch();
        $dataPerformance = $searchPerformance->search($this->request->queryParams);

        $model = new Motivo();

        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchPerformance' => $searchPerformance,
            'dataPerformance' => $dataPerformance,
        ]);
    }

    /**
     * Displays a single Diagnostico model.
     * @param int $id_diagnostico Id Diagnostico
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_diagnostico)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_diagnostico),
        ]);
    }

    /**
     * Creates a new Diagnostico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Diagnostico();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_diagnostico' => $model->id_diagnostico]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Diagnostico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_diagnostico Id Diagnostico
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_diagnostico)
    {
        $model = $this->findModel($id_diagnostico);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_diagnostico' => $model->id_diagnostico]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Diagnostico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_diagnostico Id Diagnostico
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_diagnostico)
    {
        $this->findModel($id_diagnostico)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Diagnostico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_diagnostico Id Diagnostico
     * @return Diagnostico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_diagnostico)
    {
        if (($model = Diagnostico::findOne(['id_diagnostico' => $id_diagnostico])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
