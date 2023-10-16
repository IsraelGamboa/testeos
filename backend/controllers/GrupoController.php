<?php

namespace backend\controllers;

use app\models\Motivo;
use app\models\Grupo;
use app\models\search\GrupoSearch;
use app\models\Tutorado;
use app\models\search\TutoradoSearch;
use app\models\Diagnostico;
use app\models\search\DiagnosticoSearch;
use app\models\search\PerformanceSearch;
use app\models\search\CriteriosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use YII;

/**
 * GrupoController implements the CRUD actions for Grupo model.
 */
class GrupoController extends Controller
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
     * Lists all Grupo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GrupoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionDiagnostico()
    {
        $id_grupo = Yii::$app->request->get('id_grupo');

        $searchModel = new DiagnosticoSearch();
        $dataProvider = $searchModel->search(['DiagnosticoSearch' => ['grupo_id_grupo' => $id_grupo]]);
        $searchPerformance = new PerformanceSearch();
        $dataPerformance = $searchPerformance->search(['PerformanceSearch' => ['grupo_id_grupo' => $id_grupo]]);


        return $this->render('diagnostico', [
            'model' => $this->findModel($id_grupo),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchPerformance' => $searchPerformance,
            'dataPerformance' => $dataPerformance,
        ]);
    }

    public function actionLiberacion()
    {
        $id_grupo = Yii::$app->request->get('id_grupo');

        $searchModel = new CriteriosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $searchTutorado = new TutoradoSearch();
        $dataTutorado = $searchTutorado->search(['TutoradoSearch' => ['grupo_id_grupo' => $id_grupo]]);

        return $this->render('liberacion', [
            'model' => $this->findModel($id_grupo),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchTutorado' => $searchTutorado,
            'dataTutorado' => $dataTutorado,
        ]);
    }

    /**
     * Displays a single Grupo model.
     * @param int $id_grupo Id Grupo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_grupo)
    {

        $searchModel = new DiagnosticoSearch();
        $dataProvider = $searchModel->search(['DiagnosticoSearch' => ['grupo_id_grupo' => $id_grupo]]);
        $searchPerformance = new PerformanceSearch();
        $dataPerformance = $searchPerformance->search(['PerformanceSearch' => ['grupo_id_grupo' => $id_grupo]]);


        return $this->render('view', [
            'model' => $this->findModel($id_grupo),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchPerformance' => $searchPerformance,
            'dataPerformance' => $dataPerformance,
        ]);
    }

    /**
     * Creates a new Grupo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Grupo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_grupo' => $model->id_grupo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Grupo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_grupo Id Grupo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_grupo)
    {
        $model = $this->findModel($id_grupo);
        $searchModel = new TutoradoSearch();
        $dataProvider = $searchModel->search(['TutoradoSearch' => ['grupo_id_grupo' => $id_grupo]]);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_grupo' => $model->id_grupo]);
        }

        return $this->render('_form', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing Grupo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_grupo Id Grupo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_grupo)
    {
        $this->findModel($id_grupo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Grupo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_grupo Id Grupo
     * @return Grupo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_grupo)
    {
        if (($model = Grupo::findOne(['id_grupo' => $id_grupo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
