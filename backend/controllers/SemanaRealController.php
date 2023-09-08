<?php

namespace backend\controllers;

use app\models\SemanaReal;
use app\models\search\SearchSemanaReal;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;



/**
 * SemanaRealController implements the CRUD actions for SemanaReal model.
 */
class SemanaRealController extends Controller
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
     * Lists all SemanaReal models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchSemanaReal();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SemanaReal model.
     * @param int $idsemana_real Idsemana Real
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idsemana_real)
    {
        return $this->render('view', [
            'model' => $this->findModel($idsemana_real),
        ]);
    }

    /**
     * Creates a new SemanaReal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SemanaReal();
        $id_semana = Yii::$app->request->get('id_semana');
    
        $model->semana_id_semana = $id_semana;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['/semana/pat', 'id_semana' => $id_semana]);
                /* return $this->redirect(['view', 'idsemana_real' => $model->idsemana_real]); */
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SemanaReal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idsemana_real Idsemana Real
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idsemana_real)
    {
        $model = $this->findModel($idsemana_real);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idsemana_real' => $model->idsemana_real]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SemanaReal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idsemana_real Idsemana Real
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idsemana_real)
    {
        $this->findModel($idsemana_real)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SemanaReal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idsemana_real Idsemana Real
     * @return SemanaReal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idsemana_real)
    {
        if (($model = SemanaReal::findOne(['idsemana_real' => $idsemana_real])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
