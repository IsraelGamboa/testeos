<?php

namespace backend\controllers;

use app\models\Evaluacion;
use app\models\search\EvaluacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * EvaluacionController implements the CRUD actions for Evaluacion model.
 */
class EvaluacionController extends Controller
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
     * Lists all Evaluacion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EvaluacionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Evaluacion model.
     * @param int $idevaluacion Idevaluacion
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idevaluacion)
    {
        return $this->render('view', [
            'model' => $this->findModel($idevaluacion),
        ]);
    }

    /**
     * Creates a new Evaluacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Evaluacion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idevaluacion' => $model->idevaluacion]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionRegistro()
    {
        $id_grupo = Yii::$app->request->get('id_grupo');
        if(isset($_POST)){
            $totalCriterios=$_POST["totalCriterios"];
            $totalTutorados=$_POST["totalTutorados"];

        for($i = 0; $i < $totalTutorados; $i++ ){
            for($j = 0; $j< $totalCriterios; $j++){
                $calificacion = $_POST['al'.$i.'cal'.$j];
                $idTutorado = $_POST['tutorado'.$i];
                $idCriterio = $_POST['criterio'.$j];

                $model = new Evaluacion();

                $model->calificacion = $calificacion;
                $model->tutorado_idtutorado = $idTutorado;
                $model->criterios_id_criterios = $idCriterio;

                //verificar si existe para actualizar y no insertar de nuevo - verificar como trabaja actionupdate - solo hace faklta insertar el id de la calificacion
                $id_calificacion = (isset($_POST['Cal'.$i.'Id'.$j])) ? intval($_POST['Cal'.$i.'Id'.$j]) : 0;
                if ($id_calificacion != 0) {

                    $model = $this->findModel($id_calificacion);
                    $model->calificacion = intval($calificacion);
                    //$model->isNewRecord = false;

                    $model->save();
                    //asignar valor al modelo y guardar - o llmar a find model 
                }else{
                    $model->save();
                }
                
            }
        }
        
        }

        return $this->redirect(['grupo/evaluacion', 'id_grupo' => 1]);
    }

    /**
     * Updates an existing Evaluacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idevaluacion Idevaluacion
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idevaluacion)
    {
        $model = $this->findModel($idevaluacion);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idevaluacion' => $model->idevaluacion]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Evaluacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idevaluacion Idevaluacion
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idevaluacion)
    {
        $this->findModel($idevaluacion)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Evaluacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idevaluacion Idevaluacion
     * @return Evaluacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idevaluacion)
    {
        if (($model = Evaluacion::findOne(['idevaluacion' => $idevaluacion])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
