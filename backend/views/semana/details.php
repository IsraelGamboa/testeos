<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\SemanaReal;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\Semana $model */
/** @var app\models\SemanaReal $model */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\search\SearchSemanaReal $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */


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





    <div class="col text-center pb-3">
        <?= Html::a('Añadir semana real', ['semana-real/view'], ['class' => 'btn btn-success']) ?>
    </div>
</div>

