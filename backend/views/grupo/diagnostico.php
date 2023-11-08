<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Performance;
use yii\db\Query;
use app\models\Diagnostico;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\Grupo $model */
/** @var app\models\search\DiagnosticoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\search\PerformanceSearch $searchModel */

$this->title = "Diarnostico ".$model->id_grupo;
$this->params['breadcrumbs'][] = ['label' => 'Grupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Grupo ".$model->id_grupo, 'url' => ['update', 'id_grupo' => $model->id_grupo]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="grupo-view">

    <h2 class="text-center">Diagnostico inicial del grupo</h2>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_grupo',
            'nombre',
        ],
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id_diagnostico',
            'matricula',
            'nombre',
            'asignatura',
            //'motivo_id_motivo',
            [
                'attribute' => 'motivo_id_motivo', // Nombre de la columna en tu modelo Diagnostico
                'label' => 'Motivo', // Etiqueta para mostrar en la columna
                'value' => function ($model) {
                    // Aquí obtienes el nombre del motivo relacionado
                    return $model->motivoIdMotivo->nombre; // Asumiendo que la relación se llama "motivo"
                },
            ],
            
            'otro',
            'especifique',
            //'grupo_id_grupo',
            //'excelente',
            //'bueno',
            //'riesgo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index) {
                    $id_grupo = Yii::$app->request->get('id_grupo');
                    if ($action === 'view') {
                        // Redireccionar a la acción 'view' en un controlador diferente
                        return Url::to(['/diagnostico/view', 'id_diagnostico' => $model->id_diagnostico, 'id_grupo'=>$id_grupo]);
                    } elseif ($action === 'update') {

                        // Redireccionar a la acción 'update' en un controlador diferente
                        return Url::to(['/diagnostico/update', 'id_diagnostico' => $model->id_diagnostico, 'id_grupo'=>$id_grupo]);
                    } elseif ($action === 'delete') {
                        // Redireccionar a la acción 'delete' en un controlador diferente

                        return Url::to(['/diagnostico/delete', 'id_diagnostico' => $model->id_diagnostico, 'id_grupo'=>$id_grupo]);
                    }
                    // Otras acciones y redirecciones personalizadas según sea necesario
                    return '';
                }
            ],
        ],
    ]); ?>

    <p>
        <?= Html::a('Añadir alumno', ['diagnostico/create', 'id_grupo'=>$model->id_grupo], ['class' => 'btn btn-warning']) ?>
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
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $dataPerformance, $key, $index) {
                    $id_grupo = Yii::$app->request->get('id_grupo');

                    if ($action === 'view') {
                        // Redireccionar a la acción 'view' en un controlador diferente
                        return Url::to(['/performance/view', 'iddesempeño' => $dataPerformance->iddesempeño, 'id_grupo'=>$id_grupo]);
                    } elseif ($action === 'update') {

                        // Redireccionar a la acción 'update' en un controlador diferente
                        return Url::to(['/performance/update', 'iddesempeño' => $dataPerformance->iddesempeño, 'id_grupo'=>$id_grupo]);
                    } elseif ($action === 'delete') {
                        // Redireccionar a la acción 'delete' en un controlador diferente

                        return Url::to(['/performance/delete', 'iddesempeño' => $dataPerformance->iddesempeño, 'id_grupo'=>$id_grupo]);
                    }
                    // Otras acciones y redirecciones personalizadas según sea necesario
                    return '';
                }
            ],
        ],
        ]); ?>

<?php


$models = $dataPerformance->models;
if (empty($models)) {
    ?> 
    <P>
        <?= Html::a('Desempeño de grupo', ['performance/create', 'id_grupo'=>$model->id_grupo], ['class' => 'btn btn-info']) ?>
    </P>

<?php
} else {
    ?> 
    <div class="table-responsive text-center">
    <!--<h1>hola</h1> -->
    <table class="table mi-tabla">
        <!-- <thead class="border">
            <th colspan="8"><h3>DESEMPEÑO DE GRUPO</i></h3></th>
        </thead> -->
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
            $id_grupo = Yii::$app->request->get('id_grupo');
            $resultado=0;
            $db = Yii::$app->db;
            $resultados = Performance::find()->where(['grupo_id_grupo' => $id_grupo])->all();

                foreach($resultados as $resultado){
                    //echo '<th>CANTIDAD</th>';

                    //echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$resultado["excelente"].'" disabled></td>';

                    //echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$resultado["bueno"].'" disabled></td>';

                    //echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$resultado["riesgo"].'" disabled></td>';
                }

                $suma = $resultado["excelente"] + $resultado["bueno"] + $resultado["riesgo"];
                /*echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$suma.'" disabled></td>';*/

                


            ?>

                </tr>
                <tr>
                    <th>PORCENTAJE</th>
                    <?php
                        $excelente = ($resultado["excelente"] / $suma) * 100;
                        $result_exce = number_format($excelente, 2 , '.', '');
                        echo '<td><input type="text" class="form-group form-group-sm col-10" placeholder="0" value="'.$result_exce.'" disabled></td>';
                        $bueno = ($resultado["bueno"] / $suma) * 100;
                        $result_bueno = number_format($bueno, 2 , '.', '');
                        number_format($bueno, 2 , ',', '.');
                        echo '<td><input type="text" class="form-group form-group-sm col-10" placeholder="0" value="'.$result_bueno.'" disabled></td>';
                        $riesgo = ($resultado["riesgo"] / $suma) * 100;
                        $result_riesgo = number_format($riesgo, 2 , '.', '');
                        echo '<td><input type="text" class="form-group form-group-sm col-10" placeholder="0" value="'.$result_riesgo.'" disabled></td>';
                        $total = $excelente + $bueno + $riesgo;
                        $result_total = number_format($total, 2 , '.', '');
                        echo '<td><input type="text" class="form-group form-group-sm col-10" placeholder="0" value="'.$result_total.'" disabled></td>';

                        echo '<td colspan="2">'.Html::a('PDF', ['site/report'], ['class' => 'btn btn-info', 'target' => '_blank']).'</td>';
                    ?>
                </tr>
        </tbody>
    </table>
</div>
<?php
}


?>

</div>