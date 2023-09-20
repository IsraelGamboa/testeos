<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/** @var app\models\SemanaReal $model */
/** @var yii\web\View $this */
/** @var app\models\Semana $model */



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
.table-semana{
    border: solid ;
}

</style>

<div class="semana bg-white my-3 mx-2">
    <table class="table-semana table">
            <tr style='height: 50px; text-align: center; background-color: #c5e0b3; border: solid;'>
                <th rowspan="2" style="border: solid;" class="center">PROGRAMADA</th>
                <th style="border: solid;"><?= $model->getAttributeLabel('tipo_tutoria') ?></th>
                <th style="border: solid;"><?= $model->getAttributeLabel('tematica') ?></th>
                <th style="border: solid;"><?= $model->getAttributeLabel('objetivos') ?></th>
                <th style="border: solid;"><?= $model->getAttributeLabel('justificacion') ?></th>
                <th style="border: solid;"><?= $model->getAttributeLabel('estrategias_tutor') ?></th>
                <th style="border: solid;"><?= $model->getAttributeLabel('acciones') ?></th>
                <th style="border: solid;"><?= $model->getAttributeLabel('estrategias_tutorado') ?></th>
            </tr>
            <?php
                echo "<tr style='height: 200px; '>";
                    echo '<td style="border: solid;"><p class="b">' . $model->tipo_tutoria . '</p></td>';
                    echo '<td style="border: solid;"><p class="a">' . $model->tematica. '</p></td>';
                    echo '<td style="border: solid;"><p class="a">' . $model->objetivos . '</p></td>';
                    echo '<td style="border: solid;"><p class="a">' . $model->justificacion . '</p></td>';
                    echo '<td style="border: solid;"><p class="a">' . $model->estrategias_tutor . '</p></td>';
                    echo '<td style="border: solid;"><p class="a">' . $model->acciones . '</p></td>';
                    echo '<td style="border: solid;"><p class="a">' . $model->estrategias_tutorado . '</p></td>';
                echo "<tr>";
            ?>
            <!--<tr>
                <th rowspan="2" style="border: solid;">Semana Real</th>
                <th style="border: solid;">Sesion aplicada</th>
                <th style="border: solid;">Sesion no aplicada</th>
                <th style="border: solid;">Tutorados</th>
                <th style="border: solid;">Faltas</th>
                <th style="border: solid;">Hombres</th>
                <th style="border: solid;">Mujeres</th>
                <th style="border: solid;">Total</th>
            </tr> -->
    </table>



    <?php
    $id_pat = Yii::$app->request->get('id_pat');
    
    ?>

    <div class="col text-center pb-3">
        <?= Html::a('Ver semana', ['/semana/pat', 'id_semana'=> $model->id_semana, 'id_pat'=>$id_pat], ['class' => 'btn btn-info']) ?>
    </div>
</div>

