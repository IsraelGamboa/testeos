<?php

namespace backend\controllers;

use Yii;

use app\models\Semana;
use app\models\Pat;
use app\models\search\SearchSemana;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


use app\models\search\SearchSemanaReal;
use app\models\SemanaReal;



/**
 * SemanaController implements the CRUD actions for Semana model.
 */
class SemanaController extends Controller
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
     * Lists all Semana models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchSemana();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Semana model.
     * @param int $id_semana Id Semana
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_semana)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_semana),
        ]);
    }

    public function actionPat($id_semana)
    {

        $model = $this->findModel($id_semana);


        // Realiza más operaciones con $resultado si es necesario

        $searchModel = new SearchSemanaReal();
        $dataProvider = $searchModel->search(['SearchSemanaReal' => ['semana_id_semana' => $id_semana]]);

        return $this->render('pat', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Semana model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */


    public function actionCreate()
    {
        $model = new Semana();
    
        $id_pat = Yii::$app->request->get('id_pat');
    
        $model->pat_id_pat = $id_pat;
    
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', '¡Registro éxitoso!');
                return $this->redirect(['/pat/update', 'id_pat' => $id_pat]);
            }
        } else {
            $model->loadDefaultValues();
        }
    
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    

    /**
     * Updates an existing Semana model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_semana Id Semana
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_semana)
    {
        $model = $this->findModel($id_semana);

        $id_pat = Yii::$app->request->get('id_pat');
    
        $model->pat_id_pat = $id_pat;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', '¡Cambios realizados con éxito!');
            return $this->redirect(['/pat/update', 'id_pat' => $id_pat]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Semana model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_semana Id Semana
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_semana)
    {
        $id_pat = Yii::$app->request->get('id_pat');

        // Encuentra y elimina la semana
        $this->findModel($id_semana)->delete();
    
        Yii::$app->session->setFlash('success', '¡Registro eliminado con éxito!');
        return $this->redirect(['/pat/update', 'id_pat' => $id_pat]);
    }
    

    /**
     * Finds the Semana model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_semana Id Semana
     * @return Semana the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_semana)
    {
        if (($model = Semana::findOne(['id_semana' => $id_semana])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
