<?php

namespace backend\controllers;

use app\models\SemanaReal;
use app\models\search\SearchSemanaReal;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\web\UploadedFile;



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

    // ...
    
    public function actionCreate()
    {
        $model = new SemanaReal();
        $id_semana = Yii::$app->request->get('id_semana');
        $id_pat = Yii::$app->request->get('id_pat');
    
        $model->semana_id_semana = $id_semana;
        $model->pat_id_pat = $id_pat;
    
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $evidencias = UploadedFile::getInstances($model, 'evidencias');
    
            if ($model->validate()) {
                $rutaEvidencias = []; // Almacena las rutas de las imagenes
    
                foreach ($evidencias as $evidencia) {
                    // Asigna nombre unico para evitar duplicaciones de la misma
                    $imageName = 'evidencia_' . time() . '_' . Yii::$app->security->generateRandomString(10) . '.' .$evidencia->extension;
    
                    // Guarda la imagen en el servidor
                    $ruta = '../img/evidencias/' . $imageName;
                    $evidencia->saveAs($ruta);
    
                    // Guarda la ruta en el array
                    $rutaEvidencias[] = $ruta;
                }
    
                // Guarda las rutas en la BD
                $model->evidencias = implode(',', $rutaEvidencias);
    
                if ($model->save()) {
                    return $this->redirect(['semana/pat', 'id_semana' => $model->semana_id_semana, 'id_pat' => $model->pat_id_pat]);
                }
            }
        }
    
        return $this->render('create', ['model' => $model]);
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
    
        $id_semana = Yii::$app->request->get('id_semana');
        $id_pat = Yii::$app->request->get('id_pat');
        
        $model->semana_id_semana = $id_semana;
        $model->pat_id_pat = $id_pat;
    
        // Guarda las imágenes existentes en una variable antes de cargar el modelo
        $existingImages = explode(',', $model->evidencias);
    
        if ($model->load(Yii::$app->request->post())) {
            // Procesa la carga de nuevas imágenes solo si se seleccionan
            $newImages = UploadedFile::getInstances($model, 'evidencias');
    
            if (!empty($newImages)) {
                // Procesa las nuevas imágenes y guarda las rutas en la base de datos
                $rutaEvidencias = [];
    
                foreach ($newImages as $newImage) {
                    $imageName = 'evidencia_' . time() . '_' . Yii::$app->security->generateRandomString(10) . '.' . $newImage->extension;
                    $ruta = '../img/evidencias/' . $imageName;
                    $newImage->saveAs($ruta);
                    $rutaEvidencias[] = $ruta;
                }
    
                // Combina las rutas existentes y las nuevas
                $model->evidencias = implode(',', array_merge($existingImages, $rutaEvidencias));
            }
    
            // Guarda el modelo con las imágenes actualizadas
            if ($model->save()) {
                return $this->redirect(['semana/pat', 'id_semana' => $model->semana_id_semana, 'id_pat' => $model->pat_id_pat]);
            }
        }
    
        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDeleteImage($idsemana_real, $img_name)
    {
        
        $model = $this->findModel($idsemana_real);

        $ruta = $model->evidencias;

        $ruta = str_replace(',../img/evidencias/'. $img_name, '', $ruta);


        $model->evidencias = $ruta;


        echo json_encode($model->save());

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

        
        $id_semana = Yii::$app->request->get('id_semana');
        $id_pat = Yii::$app->request->get('id_pat');
        //$id_tutor = Yii::$app->request->get('id_tutor');
    


        return $this->redirect(['/semana/pat', 'id_semana' => $id_semana, 'id_pat'=>$id_pat]);
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
