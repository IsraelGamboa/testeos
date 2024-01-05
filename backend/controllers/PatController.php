<?php

namespace backend\controllers;

use app\models\Pat;
use app\models\search\SearchPat;
use app\models\search\SearchSemestre;
use app\models\search\SearchSemana;
use app\models\search\SearchSemanaReal;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Semana;
use app\models\Semestre;
use yii\data\ActiveDataProvider;



/**
 * PatController implements the CRUD actions for Pat model.
 */
class PatController extends Controller
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
     * Lists all Pat models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchPat();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pat model.
     * @param int $id_pat Id Pat
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pat)
    {

        /* $searchModel = new SearchSemana();
        $dataProvider = $searchModel->search($this->request->queryParams); */

        // Encontrar el modelo Pat en función del ID proporcionado


        $model = $this->findModel($id_pat);

        $id_tutor = 1;

        // Cargar el modelo de búsqueda de semanas relacionadas
        $searchModel = new SearchSemana();

        $searchReal = new SearchSemanaReal();
    
        // Realizar la búsqueda de las semanas relacionadas con este Pat
        $dataReal = $searchReal->search(['SearchSemanaReal' => ['tutor_id_tutor' => $id_tutor]]);

        // Realizar la búsqueda de las semanas reales relacionadas con este Pat
        $dataProvider = $searchModel->search(['SearchSemana' => ['pat_id_pat' => $id_pat]]);



/*         return $this->render('view', [
            'model' => $this->findModel($id_pat),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataReal' => $dataReal,

        ]); */


        $filename =  time() . ".xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        
        echo $this->renderPartial('view', [
            'model' => $this->findModel($id_pat),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataReal' => $dataReal,

        ]);

        exit;
    }

        /**
     * Displays a single Semana model.
     * @param int $id_semana Id Semana
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */


    /**
     * Creates a new Pat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pat();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_pat' => $model->id_pat]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pat Id Pat
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pat)
    {
        // Encontrar el modelo Pat en función del ID proporcionado
        $model = $this->findModel($id_pat);
    
        // Cargar el modelo de búsqueda de semanas relacionadas
        $searchModel = new SearchSemana();        
    
        // Realizar la búsqueda de las semanas relacionadas con este Pat
        $dataProvider = $searchModel->search(['SearchSemana' => ['pat_id_pat' => $id_pat]]);

        //Paginacion,  falta por mejorar
        $dataProvider->pagination->pageSize = 10; 
    
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pat' => $model->id_pat]);
        }
    
        return $this->render('_form', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    

    /**
     * Deletes an existing Pat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pat Id Pat
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pat)
    {
        $this->findModel($id_pat)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pat Id Pat
     * @return Pat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pat)
    {
        if (($model = Pat::findOne(['id_pat' => $id_pat])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    
}
