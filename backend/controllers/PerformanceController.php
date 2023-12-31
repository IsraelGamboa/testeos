<?php

namespace backend\controllers;

use app\models\Performance;
use app\models\search\PerformanceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * PerformanceController implements the CRUD actions for Performance model.
 */
class PerformanceController extends Controller
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
     * Lists all Performance models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PerformanceSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Performance model.
     * @param int $iddesempeño Iddesempeño
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($iddesempeño)
    {
        return $this->render('view', [
            'model' => $this->findModel($iddesempeño),
        ]);
    }

    /**
     * Creates a new Performance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Performance();

        $id_grupo = Yii::$app->request->get('id_grupo');
    
        $model->grupo_id_grupo = $id_grupo;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', '¡Registro exitoso!');
                return $this->redirect(['/grupo/diagnostico', 'id_grupo' => $id_grupo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Performance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $iddesempeño Iddesempeño
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($iddesempeño)
    {
        $model = $this->findModel($iddesempeño);

        $id_grupo = Yii::$app->request->get('id_grupo');
    
        $model->grupo_id_grupo = $id_grupo;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', '¡Cambios realizados con exito!');
            return $this->redirect(['/grupo/diagnostico', 'id_grupo' => $id_grupo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Performance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $iddesempeño Iddesempeño
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($iddesempeño)
    {
        $id_grupo = Yii::$app->request->get('id_grupo');

        $this->findModel($iddesempeño)->delete();

        Yii::$app->session->setFlash('success', '¡Registro eliminado con exito!');

        return $this->redirect(['/grupo/diagnostico', 'id_grupo'=>$id_grupo]);
    }

    /**
     * Finds the Performance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $iddesempeño Iddesempeño
     * @return Performance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($iddesempeño)
    {
        if (($model = Performance::findOne(['iddesempeño' => $iddesempeño])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
