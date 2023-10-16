<?php

namespace backend\controllers;

use app\models\Tutorado;
use app\models\search\TutoradoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TutoradoController implements the CRUD actions for Tutorado model.
 */
class TutoradoController extends Controller
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
     * Lists all Tutorado models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TutoradoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tutorado model.
     * @param int $idtutorado Idtutorado
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idtutorado)
    {
        return $this->render('view', [
            'model' => $this->findModel($idtutorado),
        ]);
    }

    /**
     * Creates a new Tutorado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Tutorado();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idtutorado' => $model->idtutorado]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tutorado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idtutorado Idtutorado
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idtutorado)
    {
        $model = $this->findModel($idtutorado);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idtutorado' => $model->idtutorado]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tutorado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idtutorado Idtutorado
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idtutorado)
    {
        $this->findModel($idtutorado)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tutorado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idtutorado Idtutorado
     * @return Tutorado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idtutorado)
    {
        if (($model = Tutorado::findOne(['idtutorado' => $idtutorado])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
