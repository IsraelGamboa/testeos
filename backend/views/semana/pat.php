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




$id_pat = Yii::$app->request->get('id_pat');

if(isset($id_pat)){

    $this->title = 'Semana';
    $this->params['breadcrumbs'][] = ['label' => 'Plan de accion tutorial', 'url' => ['pat/index']];
    $this->params['breadcrumbs'][] = ['label' => 'PAT '.$id_pat, 'url' => ['pat/update', 'id_pat' => $id_pat]];
    $this->params['breadcrumbs'][] = $this->title;
}else{
    echo "no existe";
}



\yii\web\YiiAsset::register($this);
?>
<style>
.a {
    white-space: pre-line;
    text-align: justify;
}
.b{
    text-align: center;
    border: solid;
}
.p{
    align-items: flex;
}


.table-semana, th, td{
    border: solid;
}
</style>

<div class="semana bg-white my-3 mx-2">
    <table class="table-semana table">

            <tr style='height: 50px; text-align: center; background-color: #c5e0b3;'>
                <th rowspan="2" class="p">Programada</th>
                <th>Tipo de tutoria</th>
                <th>Tematica</th>
                <th>Objetivos</th>
                <th>Justificacion</th>
                <th>Estrategias del tutor</th>
                <th>Acciones</th>
                <th>Estrategias del tutorado</th>
            </tr>

            <?php
                echo "<tr style='height: 200px;'>";
                    echo '<td><p class="a">' . $model->tipo_tutoria . '</p></td>';
                    echo '<td><p class="a">' . $model->tematica. '</p></td>';
                    echo '<td><p class="a">' . $model->objetivos . '</p></td>';
                    echo '<td><p class="a">' . $model->justificacion . '</p></td>';
                    echo '<td><p class="a">' . $model->estrategias_tutor . '</p></td>';
                    echo '<td><p class="a">' . $model->acciones . '</p></td>';
                    echo '<td><p class="a">' . $model->estrategias_tutorado . '</p></td>';
                echo "<tr>";

            ?>
    </table>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            /* ['class' => 'yii\grid\SerialColumn'], */

            //'idsemana_real',
            'orden_semana',
            'sesion_grupal',
            'sesion_no_grupal',
            'tutorados_atendidos',
            'faltas',
            //'total_grupo',
            'hombres',
            'mujeres',
            'total_tutorados',
            //'evidencias',
            'observaciones:ntext',
            //'semana_id_semana',
            //'tutor_id_tutor',
            //'pat_id_pat',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index) {
                    $id_semana = Yii::$app->request->get('id_semana');
                    $id_pat = Yii::$app->request->get('id_pat');
                    if ($action === 'view') {
                        return Url::to(['/semana-real/view', 'idsemana_real' => $model->idsemana_real, 'id_semana'=>$id_semana, 'id_pat'=>$id_pat]);
                    } elseif ($action === 'update') {
                        return Url::to(['/semana-real/update', 'idsemana_real' => $model->idsemana_real, 'id_semana'=>$id_semana,  'id_pat' => $id_pat]);
                    } elseif ($action === 'delete') {
                        return Url::to(['/semana-real/delete', 'idsemana_real' => $model->idsemana_real, 'id_semana'=>$id_semana, 'id_pat' => $id_pat]);
                    }
                    return '';
                }
            ],
        ],
    ]);?>


    <?php
    $id_pat = Yii::$app->request->get('id_pat');

    $models = $dataProvider->models;
    if (empty($models)) {
        /* echo "No existe ningún dato en el arreglo.";*/?> 
            <p>
                <?=Html::a('Añadir semana real',  ['/semana-real/create', 'id_semana' => $model->id_semana, 'id_pat'=>$id_pat], ['class' => 'btn btn-success'])?>
            </p>
            <?php
    } else {
        /* echo "El arreglo contiene datos."; */
    }


    ?>



    <!-- Tratar de colocar el formulario funcional en este apartado -->


</div>