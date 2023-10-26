<?php

namespace backend\controllers;

use app\models\Liberacion;
use app\models\search\LiberacionSearch;
use app\models\Tutorado;
use app\models\search\TutoradoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * LiberacionController implements the CRUD actions for Liberacion model.
 */
class LiberacionController extends Controller
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
     * Lists all Liberacion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LiberacionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Liberacion model.
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
     * Creates a new Liberacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */


     public function actionCreate()
     {
         $model = new Liberacion();
     
         if (Yii::$app->request->isPost) {
             $post = Yii::$app->request->post();
     
             // Datos del Formulario
             $data = $post['Liberacion'];
     
             // Iterar a través de los datos del formulario
             foreach ($data as $index => $formData) {
                 // Buscar el modelo existente por el ID
                 $id = $formData['idevaluacion']; // Asegúrate de tener un campo 'id' en tus datos
                 $existingModel = Liberacion::findOne($id);
     
                 // Si no existe, crea un nuevo modelo
                 if ($existingModel === null) {
                     $model = new Liberacion();
                 } else {
                     // Si existe, actualiza el modelo existente con los nuevos valores
                     $model = $existingModel;
                 }
     
                 // Asignar los valores del formulario al modelo
                 $model->attributes = $formData;
     
                 // Validar y guardar el modelo
                 if ($model->validate() && $model->save()) {
                     // Puedes realizar alguna acción adicional si es necesario
                 } else {
                     // Handle validation errors or save errors if needed
                 }
             }
     
             // Redireccionar a la vista de la tabla u otra acción
             return $this->redirect(['index']);
         }
     
         // Renderizar la vista del formulario
         return $this->render('create', [
             'model' => $model,
         ]);
     }
     

    
    
    

    /**
     * Updates an existing Liberacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idevaluacion Idevaluacion
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idevaluacion)
    {
        $model = $this->findModel($idevaluacion);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Liberacion model.
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
     * Finds the Liberacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idevaluacion Idevaluacion
     * @return Liberacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idevaluacion)
    {
        if (($model = Liberacion::findOne(['idevaluacion' => $idevaluacion])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
