<?php

use yii\helpers\Html;
use app\models\SemanaReal;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\Semana $model */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\search\SearchSemanaReal $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */






$this->title = $model->id_semana;
$this->params['breadcrumbs'][] = ['label' => 'Semanas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
.a {
    white-space: pre-line;
    text-align: justify;
}
.b{
    text-align: center;
}
.table-body{
    background-color: #fef2cb;
}
.table-head{
    background-color: #c5e0b3;
}
</style>

<div class="semana bg-white my-3 mx-2">
    <table class="table-semana table">
        <thead class="table-head" >
            <tr style='height: 50px; text-align: center; '>
                <th>Tipo de tutoria</th>
                <th>Tematica</th>
                <th>Objetivos</th>
                <th>Justificacion</th>
                <th>Estrategias del tutor</th>
                <th>Acciones</th>
                <th>Estrategias del tutorado</th>
            </tr>
        </thead>
        <tbody class="table-body">            
            <?php
                echo "<tr style='height: 200px;'>";
                    echo '<td><p class="b">' . $model->tipo_tutoria . '</p></td>';
                    echo '<td><p class="a">' . $model->tematica. '</p></td>';
                    echo '<td><p class="a">' . $model->objetivos . '</p></td>';
                    echo '<td><p class="a">' . $model->justificacion . '</p></td>';
                    echo '<td><p class="a">' . $model->estrategias_tutor . '</p></td>';
                    echo '<td><p class="a">' . $model->acciones . '</p></td>';
                    echo '<td><p class="a">' . $model->estrategias_tutorado . '</p></td>';
                echo "<tr>";

            ?>

        </tbody>
    </table>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idsemana_real',
            'sesion_grupal',
            'sesion_no_grupal',
            'tutorados_atendidos',
            'faltas',
            //'total_grupo',
            //'hombres',
            //'mujeres',
            //'total_tutorados',
            //'evidencias',
            //'observaciones:ntext',
            //'semana_id_semana',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index) {
                    $id_semana = Yii::$app->request->get('id_semana');
                    if ($action === 'view') {
                        // Redireccionar a la acción 'view' en un controlador diferente
                        return Url::to(['/semana-real/view', 'idsemana_real' => $model->idsemana_real]);
                    } elseif ($action === 'update') {

                        // Redireccionar a la acción 'update' en un controlador diferente
                        return Url::to(['/semana-real/update', 'idsemana_real' => $model->idsemana_real,  'id_semana' => $id_semana]);
                    } elseif ($action === 'delete') {
                        // Redireccionar a la acción 'delete' en un controlador diferente

                        return Url::to(['/semana-real/delete', 'idsemana_real' => $model->idsemana_real,  'id_semana' => $id_semana]);
                    }
                    // Otras acciones y redirecciones personalizadas según sea necesario
                    return '';
                }
            ],
        ],
    ]); ?>


    <p>
        <?= Html::a('Create Semana Real',  ['/semana-real/create', 'id_semana' =>$model->id_semana], ['class' => 'btn btn-success']) ?>
    </p>


    <!-- Tratar de colocar el formulario funcional en este apartado -->


</div>