<?php

namespace backend\controllers;

use app\models\Criterios;
use app\models\search\CriteriosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CriteriosController implements the CRUD actions for Criterios model.
 */
class CriteriosController extends Controller
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
     * Lists all Criterios models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CriteriosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Criterios model.
     * @param int $id_criterios Id Criterios
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_criterios)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_criterios),
        ]);
    }

    /**
     * Creates a new Criterios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Criterios();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_criterios' => $model->id_criterios]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Criterios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_criterios Id Criterios
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_criterios)
    {
        $model = $this->findModel($id_criterios);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_criterios' => $model->id_criterios]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Criterios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_criterios Id Criterios
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_criterios)
    {
        $this->findModel($id_criterios)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Criterios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_criterios Id Criterios
     * @return Criterios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_criterios)
    {
        if (($model = Criterios::findOne(['id_criterios' => $id_criterios])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
