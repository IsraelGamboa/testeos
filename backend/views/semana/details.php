<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Semana $model */
?>

<div class="table-responsive">
    <table border="1" cellspacing="15" class="table-detail-semana">
            <caption>Detalles de la semana</caption>
            <tr style='height: 50px; text-align: center; '>
                <th rowspan="2" class="bg-white">PROGRAMADA</th>
                <th><?= ($model->attributeLabels())['tipo_tutoria'] ?></th>
                <th><?= ($model->attributeLabels())['tematica'] ?></th>
                <th><?= ($model->attributeLabels())['objetivos'] ?></th>
                <th><?= ($model->attributeLabels())['justificacion'] ?></th>
                <th><?= ($model->attributeLabels())['estrategias_tutor'] ?></th>
                <th><?= ($model->attributeLabels())['acciones'] ?></th>
                <th><?= ($model->attributeLabels())['estrategias_tutorado'] ?></th>
            </tr>
            <tr>
                <!-- Agregar alto de fila fijo y scroll cuando sea necesario -->
                <td class=""><?= $model->tipo_tutoria ?></td>
                <td class=""><?= $model->tematica ?></td>
                <td class=""><?= $model->objetivos ?></td>
                <td class=""><?= $model->justificacion ?></td>
                <td class=""><?= $model->estrategias_tutor ?></td>
                <td class=""><?= $model->acciones ?></td>
                <td class=""><?= $model->estrategias_tutorado ?></td>
            </tr>
            <!-- nlbr2
            en el detail view poner el description:nhtml o html
             -->
            <!-- 
                tr>(td.a>p)*4 
            -->
            <!-- <tr>
                <td class="a">
                    <p></p>
                </td>
                <td class="a">
                    <p></p>
                </td>
                <td class="a">
                    <p></p>
                </td>
                <td class="a">
                    <p></p>
                </td>
            </tr> -->
    </table>

</div>