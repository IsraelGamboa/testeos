<?php

namespace backend\controllers;

use app\models\Semestre;
use app\models\search\SearchSemestre;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SemestreController implements the CRUD actions for Semestre model.
 */
class SemestreController extends Controller
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
     * Lists all Semestre models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchSemestre();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Semestre model.
     * @param int $id_semestre Id Semestre
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_semestre)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_semestre),
        ]);
    }

    /**
     * Creates a new Semestre model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Semestre();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_semestre' => $model->id_semestre]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Semestre model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_semestre Id Semestre
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_semestre)
    {
        $model = $this->findModel($id_semestre);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_semestre' => $model->id_semestre]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Semestre model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_semestre Id Semestre
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_semestre)
    {
        $this->findModel($id_semestre)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Semestre model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_semestre Id Semestre
     * @return Semestre the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_semestre)
    {
        if (($model = Semestre::findOne(['id_semestre' => $id_semestre])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
