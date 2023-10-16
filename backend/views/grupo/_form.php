<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Tutorado;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var app\models\search\TutoradoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var yii\web\View $this */
/** @var app\models\Grupo $model */
/** @var yii\widgets\ActiveForm $form */

if(isset($model->id_grupo)){

    $this->title = 'Actualizar Grupo: ' . $model->id_grupo;
    $this->params['breadcrumbs'][] = ['label' => 'Grupos', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => "Grupo ".$model->id_grupo, 'url' => ['view', 'id_grupo' => $model->id_grupo]];
    $this->params['breadcrumbs'][] = $this->title;
}else{

}
?>

<div class="grupo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php
    if(isset($model->id_grupo)){

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
    
                'idtutorado',
                'nombre',
                'grupo_id_grupo',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, $model, $key, $index) {
    
                        if ($action === 'view') {
                            // Redireccionar a la acción 'view' en un controlador diferente
                            return Url::to(['/tutorado/view', 'idtutorado' => $model->idtutorado]);
                        } elseif ($action === 'update') {
    
                            // Redireccionar a la acción 'update' en un controlador diferente
                            return Url::to(['/tutorado/update', 'idtutorado' => $model->idtutorado]);
                        } elseif ($action === 'delete') {
                            // Redireccionar a la acción 'delete' en un controlador diferente
    
                            return Url::to(['/tutorado/delete', 'idtutorado' => $model->idtutorado]);
                        }
                        // Otras acciones y redirecciones personalizadas según sea necesario
                        return '';
                    }
                ],
            ],
        ]);

        $id_grupo = Yii::$app->request->get('id_grupo');

        echo Html::a('Añadir alumno', ['tutorado/create'], ['class' => 'btn btn-success']);
        echo ' ';
        echo Html::a('Diagnostico', ['grupo/diagnostico', 'id_grupo'=>$id_grupo], ['class' => 'btn btn-warning']);
        echo ' ';
        echo Html::a('Liberacion', ['grupo/liberacion', 'id_grupo'=>$id_grupo], ['class' => 'btn btn-info']);


    }else{
        echo "no existe";
    }
    ?>

</div>
