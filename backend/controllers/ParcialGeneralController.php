<?php

namespace backend\controllers;

use app\models\ParcialGeneral;
use app\models\search\SearchParcialGeneral;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ParcialGeneralController implements the CRUD actions for ParcialGeneral model.
 */
class ParcialGeneralController extends Controller
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
     * Lists all ParcialGeneral models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchParcialGeneral();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ParcialGeneral model.
     * @param int $id_parcial_general Id Parcial General
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_parcial_general)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_parcial_general),
        ]);
    }

    /**
     * Creates a new ParcialGeneral model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ParcialGeneral();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_parcial_general' => $model->id_parcial_general]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ParcialGeneral model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_parcial_general Id Parcial General
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_parcial_general)
    {
        $model = $this->findModel($id_parcial_general);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_parcial_general' => $model->id_parcial_general]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ParcialGeneral model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_parcial_general Id Parcial General
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_parcial_general)
    {
        $this->findModel($id_parcial_general)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ParcialGeneral model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_parcial_general Id Parcial General
     * @return ParcialGeneral the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_parcial_general)
    {
        if (($model = ParcialGeneral::findOne(['id_parcial_general' => $id_parcial_general])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
