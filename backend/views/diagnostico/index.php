<?php

use app\models\Performance;
use yii\db\Query;
use app\models\Diagnostico;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\DiagnosticoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\search\PerformanceSearch $searchModel */
$this->title = 'Diagnostico inicial del grupo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnostico-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id_diagnostico',
            'matricula',
            'nombre',
            'asignatura',
            'motivo_id_motivo',
            'otro',
            'especifique',
            //'grupo_id_grupo',
            //'excelente',
            //'bueno',
            //'riesgo',
            [
                'class' => 'kartik\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {
                    $id_pat = Yii::$app->request->get('id_pat');
                    if ($action === 'view') {
                        // Redireccionar a la acción 'view' en un controlador diferente
                        return Url::to(['view', 'id_diagnostico' => $model->id_diagnostico]);
                    } elseif ($action === 'update') {

                        // Redireccionar a la acción 'update' en un controlador diferente
                        return Url::to(['update', 'id_diagnostico' => $model->id_diagnostico]);
                    } elseif ($action === 'delete') {
                        // Redireccionar a la acción 'delete' en un controlador diferente

                        return Url::to(['delete', 'id_diagnostico' => $model->id_diagnostico]);
                    }
                    // Otras acciones y redirecciones personalizadas según sea necesario
                    return '';
                }
            ],
        ],
    ]); ?>
    <p>
        <?= Html::a('Añadir alumno', ['create'], ['class' => 'btn btn-warning']) ?>
    </p>
    <h1 class="text-center">Desempeño de grupo</h1>
    <?= GridView::widget([
        'dataProvider' => $dataPerformance,
        'filterModel' => $searchPerformance,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'iddesempeño',
            'excelente',
            'bueno',
            'riesgo',
            //'grupo_id_grupo',
            [
                'class' => 'kartik\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {

                    if ($action === 'view') {
                        // Redireccionar a la acción 'view' en un controlador diferente
                        return Url::to(['/performance/view', 'iddesempeño' => $model->iddesempeño]);
                    } elseif ($action === 'update') {

                        // Redireccionar a la acción 'update' en un controlador diferente
                        return Url::to(['/performance/update', 'iddesempeño' => $model->iddesempeño]);
                    } elseif ($action === 'delete') {
                        // Redireccionar a la acción 'delete' en un controlador diferente

                        return Url::to(['/performance/delete', 'iddesempeño' => $model->iddesempeño]);
                    }
                    // Otras acciones y redirecciones personalizadas según sea necesario
                    return '';
                }
            ],
        ],
        ]); ?>


    <!-- Cambiar los td por th -->

    <?php


    $models = $dataPerformance->models;
    if (empty($models)) {
        ?> 
        <P>
            <?= Html::a('Desempeño de grupo', ['performance/create'], ['class' => 'btn btn-info']) ?>
        </P>

    <?php
    } else {
        ?> 
        <div class="table-responsive text-center">
        <!--<h1>hola</h1> -->
        <table class="table mi-tabla">
            <thead class="border">
                <th colspan="8"><h3>DESEMPEÑO DE GRUPO</i></h3></th>
            </thead>
            <tbody class="border">
                <tr>
                    <th>ALUMNOS</th>
                    <th>EXCELENTE DESEMPEÑO</th>
                    <th>BUEN DESEMPEÑO</th>
                    <th>ALTO RIESGO</th>
                    <th>TOTAL</th>
                    <th>Reporte</th>
                    
                </tr>
                <tr>
                <?php 
                $id_grupo = 1;
                $resultado=0;
                $db = Yii::$app->db;
                $resultados = Performance::find()->where(['grupo_id_grupo' => $id_grupo])->all();

                    foreach($resultados as $resultado){
                        echo '<th>CANTIDAD</th>';

                        echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$resultado["excelente"].'" disabled></td>';

                        echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$resultado["bueno"].'" disabled></td>';

                        echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$resultado["riesgo"].'" disabled></td>';
                    }

                    $suma = $resultado["excelente"] + $resultado["bueno"] + $resultado["riesgo"];
                    echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$suma.'" disabled></td>';

                        echo '<td colspan="2">'.Html::a('PDF', ['site/report'], ['class' => 'btn btn-info', 'target' => '_blank']).'</td>';


                ?>

                    </tr>
                    <tr>
                        <th>PORCENTAJE</th>
                        <?php
                            $excelente = ($resultado["excelente"] / $suma) * 100;
                            echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$excelente.'" disabled></td>';
                            $bueno = ($resultado["bueno"] / $suma) * 100;
                            echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$bueno.'" disabled></td>';
                            $riesgo = ($resultado["riesgo"] / $suma) * 100;
                            echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$riesgo.'" disabled></td>';
                            $total = $excelente + $bueno + $riesgo;
                            echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$total.'" disabled></td>';
                        ?>
                    </tr>
            </tbody>
        </table>
    </div>
    <?php
    }


    ?>

           




</div>
