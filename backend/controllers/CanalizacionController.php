<?php

namespace backend\controllers;

use app\models\Canalizacion;
use app\models\search\CanalizacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * CanalizacionController implements the CRUD actions for Canalizacion model.
 */
class CanalizacionController extends Controller
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
     * Lists all Canalizacion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CanalizacionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Canalizacion model.
     * @param int $idcanalizacion Idcanalizacion
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idcanalizacion)
    {
        return $this->render('view', [
            'model' => $this->findModel($idcanalizacion),
        ]);
    }

    /**
     * Creates a new Canalizacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Canalizacion();

        $id_grupo = Yii::$app->request->get('id_grupo');

        $model->grupo_id_grupo = $id_grupo;
        
        $model->estado = 0;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idcanalizacion' => $model->idcanalizacion]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Canalizacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idcanalizacion Idcanalizacion
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idcanalizacion)
    {
        $model = $this->findModel($idcanalizacion);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idcanalizacion' => $model->idcanalizacion]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Canalizacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idcanalizacion Idcanalizacion
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idcanalizacion)
    {
        $this->findModel($idcanalizacion)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Canalizacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idcanalizacion Idcanalizacion
     * @return Canalizacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idcanalizacion)
    {
        if (($model = Canalizacion::findOne(['idcanalizacion' => $idcanalizacion])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
