<?php

namespace backend\controllers;

use app\models\Motivo;
use app\models\search\MotivoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MotivoController implements the CRUD actions for Motivo model.
 */
class MotivoController extends Controller
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
     * Lists all Motivo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MotivoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Motivo model.
     * @param int $id_motivo Id Motivo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_motivo)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_motivo),
        ]);
    }

    /**
     * Creates a new Motivo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Motivo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_motivo' => $model->id_motivo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Motivo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_motivo Id Motivo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_motivo)
    {
        $model = $this->findModel($id_motivo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_motivo' => $model->id_motivo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Motivo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_motivo Id Motivo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_motivo)
    {
        $this->findModel($id_motivo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Motivo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_motivo Id Motivo
     * @return Motivo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_motivo)
    {
        if (($model = Motivo::findOne(['id_motivo' => $id_motivo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
