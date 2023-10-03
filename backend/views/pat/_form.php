<?php

use Yii;
use yii\db\Query;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Semana;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;

use app\models\SemanaReal;


use kartik\bs4dropdown\Dropdown;

/** @var yii\web\View $this */
/** @var app\models\Pat $model */
/** @var app\models\SemanaReal $model */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\search\SearchSemana $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\search\SearchSemanaReal $searchModel */


if(isset($model->id_pat)){

    $this->title = 'Actualizar PAT: ' . $model->id_pat;
    $this->params['breadcrumbs'][] = ['label' => 'Plan de accion tutorial', 'url' => ['index']];
    $this->params['breadcrumbs'][] = 'Actualizar';
}else{

}

?>

<div class="pat-form">

    <?php $form = ActiveForm::begin(); ?>
    

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group ">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


    <?php
        $gridColumns = [
            [
                'class'=>'kartik\grid\SerialColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'pageSummary'=>'Total',
                'pageSummaryOptions' => ['colspan' => 6],
                'header'=>'#',
                'headerOptions'=>['class'=>'kartik-sheet-style']
            ],
        
            [
                'class' => 'kartik\grid\ExpandRowColumn',

                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                // show row expanded for even numbered keys

                'detail' => function ($model, $key, $index, $column) {
                    // Contenido detallado que se mostrará cuando se expanda la fila.
                    return Yii::$app->controller->renderPartial('/semana/details', ['model' => $model]);
                },
                'headerOptions' => ['class' => 'kartik-sheet-style'], 
                'detailRowCssClass' => GridView::TYPE_LIGHT
            ],
            [
                'attribute' => 'semana',
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'value' => function ($model) {
                    // Número máximo de semanas
                    $maxSemanas = 17; // Puedes ajustar esto según tus necesidades
                    
                    // Genera un array de nombres de semanas automáticamente
                    $nombresSemanas = [];
                    for ($i = 1; $i <= $maxSemanas; $i++) {
                        $nombresSemanas[$i] = 'Semana ' . $i;
                    }
            
                    // Verifica si el valor de 'semana' existe en el array de nombresSemanas
                    return isset($nombresSemanas[$model->semana]) ? strtoupper($nombresSemanas[$model->semana]) : $model->semana;
                },
                'format' => 'raw', // Establece el formato a raw para que se interprete HTML
                'contentOptions' => ['style' => 'font-weight:bold;'], 
        
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {
                    $id_pat = Yii::$app->request->get('id_pat');
                    if ($action === 'view') {
                        // Redireccionar a la acción 'view' en un controlador diferente
                        return Url::to(['/semana/pat', 'id_semana' => $model->id_semana, 'id_pat'=> $id_pat]);
                    } elseif ($action === 'update') {

                        // Redireccionar a la acción 'update' en un controlador diferente
                        return Url::to(['/semana/update', 'id_semana' => $model->id_semana,  'id_pat' => $id_pat]);
                    } elseif ($action === 'delete') {
                        // Redireccionar a la acción 'delete' en un controlador diferente

                        return Url::to(['/semana/delete', 'id_semana' => $model->id_semana,  'id_pat' => $id_pat]);
                    }
                    // Otras acciones y redirecciones personalizadas según sea necesario
                    return '';
                }
            ],

        
        ];
  
    ?>

 
        <?php if(isset($model->id_pat)){ 
            
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => $gridColumns, // check this value by clicking GRID COLUMNS SETUP button at top of the page
                'headerContainer' => ['style' => 'top:0px', 'class' => 'kv-table-header'], // offset from top
                'floatHeader' => true, // table header floats when you scroll
                'floatPageSummary' => true, // table page summary floats when you scroll
                'floatFooter' => false, // disable floating of table footer
                'pjax' => true, // pjax is set to always false for this demo
                // parameters from the demo form
                'responsive' => true,
                'bordered' => true,
                'striped' => false,
                'condensed' => true,
                'hover' => true,
                //'showPageSummary' => true,
                'panel' => [
                    //'after' => '<div class="float-right float-end"><button type="button" class="btn btn-primary" onclick="var keys = $("#kv-grid-demo").yiiGridView("getSelectedRows").length; alert(keys > 0 ? "Downloaded " + keys + " selected books to your account." : "No rows selected for download.");"><i class="fas fa-download"></i> Download Selected</button></div><div style="padding-top: 5px;"><em>* The page summary displays SUM for first 3 amount columns and AVG for the last.</em></div><div class="clearfix"></div>',
                    'heading' => '<i class="fas fa-calendar"></i>  Semanas',
                    'type' => 'primary',
                    //'before' => '<div style="padding-top: 7px;"><em>* Resize table columns just like a spreadsheet by dragging the column edges.</em></div>',
                ],

                // set your toolbar
                'toolbar' =>  [
                    [
                        'content' =>

                            Html::a('<i class="fas fa-plus"></i>', ['/semana/create', 'id_pat' =>$model->id_pat], [
                                'class' => 'btn btn-success',
                                'title'=>Yii::t('kvgrid', 'Añadir semana'),
                                'data-pjax' => 0, 
                            ]).' '.
                            Html::a('<i class="fas fa-redo"></i>', ['grid-demo'], [
                                'class' => 'btn btn-outline-secondary',
                                'title'=>Yii::t('kvgrid', 'Reset Grid'),
                                'data-pjax' => 0, 
                            ]),
        
                            
                        'options' => ['class' => 'btn-group mr-2 me-2']
                    ],
        
                    '{toggleData}',
                ],
                'toggleDataContainer' => ['class' => 'btn-group mr-2 me-2'],
                'persistResize' => false,
                'toggleDataOptions' => ['minCount' => 10],
                'itemLabelSingle' => 'semana',
                'itemLabelPlural' => 'semanas'
            ]);
            
            ?>



                    <!-- Cambiar los td por th -->
                    <div class="container py-3">
                        <div class="table-responsive text-center">
                        <!--<h1>hola</h1> -->
                        <table class="table mi-tabla">
                            <thead class="border">
                                <th colspan="8"><h3>Concentrado de entregas de parciales</i></h3></th>
                            </thead>
                            <tbody class="border">
                                <tr>
                                    <th rowspan="2">Primera entrega de parcial</th>
                                    <td>T. Horas grupales</td>
                                    <td>T. Horas individuales</td>
                                    <td>T. Horas no impartidas</td>
                                    <td>T. Mujeres</td>
                                    <td>T. Hombres</td>
                                    <td>Num. Alumnos que faltaron en las sesiones</td>
                                    <th>Reporte</th>
                                    
                                </tr>
                                <tr>
                                <?php 
                                $id_tutor = 1;
                                $id_pat = Yii::$app->request->get('id_pat');
                                    $db = Yii::$app->db;
                                        $query = (new Query())
                                        ->select(['SUM(sesion_grupal) AS suma_grupal'])
                                        ->from('semana_real')
                                        ->where([
                                            'between', 'orden_semana', 1, 6
                                        ])
                                        ->andWhere(['tutor_id_tutor' => $id_tutor])
                                        ->andWhere(['pat_id_pat'=> $id_pat])
                                        ->one();

                                        echo '<td><input type="number" class="form-group form-group-sm col-8"  placeholder="0" value="'.$query["suma_grupal"].'" disabled></td>';
                                        

                                        $query = (new Query())
                                        ->select(['SUM(sesion_no_grupal) AS suma_no_grupal'])
                                        ->from('semana_real')
                                        ->where([
                                            'between', 'orden_semana', 1, 6
                                        ])
                                        ->andWhere(['tutor_id_tutor' => $id_tutor])
                                        ->andWhere(['pat_id_pat'=> $id_pat])
                                        ->one();
    
                                        echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$query["suma_no_grupal"].'" disabled></td>';

                                        $query = (new Query())
                                        ->select(['SUM(tutorados_atendidos) AS suma_tutorados'])
                                        ->from('semana_real')
                                        ->where([
                                            'between', 'orden_semana', 1, 6
                                        ])
                                        ->andWhere(['tutor_id_tutor' => $id_tutor])
                                        ->andWhere(['pat_id_pat'=> $id_pat])
                                        ->one();
    
                                        echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$query["suma_tutorados"].'" disabled></td>';

                                        $query = (new Query())
                                        ->select(['SUM(mujeres) AS suma_mujeres'])
                                        ->from('semana_real')
                                        ->where([
                                            'between', 'orden_semana', 1, 6
                                        ])
                                        ->andWhere(['tutor_id_tutor' => $id_tutor])
                                        ->andWhere(['pat_id_pat'=> $id_pat])
                                        ->one();
    
                                        echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$query["suma_mujeres"].'" disabled></td>';

                                        $query = (new Query())
                                        ->select(['SUM(hombres) AS suma_hombres'])
                                        ->from('semana_real')
                                        ->where([
                                            'between', 'orden_semana', 1, 6
                                        ])
                                        ->andWhere(['tutor_id_tutor' => $id_tutor])
                                        ->andWhere(['pat_id_pat'=> $id_pat])
                                        ->one();
    
                                        echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$query["suma_hombres"].'" disabled></td>';

                                        $query = (new Query())
                                        ->select(['SUM(faltas) AS suma_faltas'])
                                        ->from('semana_real')
                                        ->where([
                                            'between', 'orden_semana', 1, 6
                                        ])
                                        ->andWhere(['tutor_id_tutor' => $id_tutor])
                                        ->andWhere(['pat_id_pat'=> $id_pat])
                                        ->one();
    
                                        echo '<td><input type="number" class="form-group form-group-sm col-6" placeholder="0" value="'.$query["suma_faltas"].'" disabled></td>';


                                        $nombresParcial = "Primera";
                                        $inicio = 1;
                                        $final = 6;
                                        echo '<td>'.Html::a('PDF', ['site/report', 'id_pat'=>$id_pat, 'id_tutor'=>$id_tutor, 'parcial'=>$nombresParcial, 'inicio'=>$inicio, 'final'=>$final], ['class' => 'btn btn-info']).'</td>';


                                ?>

                                </tr>
                            </tbody>
                            <tbody class="border">
                                <tr>          
                                    <th rowspan="2">Segunda entrega de parcial</th>
                                    <td>T. Horas grupales</td>
                                    <td>T. Horas individuales</td>
                                    <td>T. Horas no impartidas</td>
                                    <td>T. Mujeres</td>
                                    <td>T. Hombres</td>
                                    <td>Num. Alumnos que faltaron en las sesiones</td>
                                    <th>Reporte</th>
                                </tr>
                                <tr>
                                    <?php
                                    $query = (new Query())
                                    ->select(['SUM(sesion_grupal) AS suma_grupal'])
                                    ->from('semana_real')
                                    ->where([
                                        'between', 'orden_semana', 7, 11
                                    ])
                                    ->andWhere(['tutor_id_tutor' => $id_tutor])
                                    ->andWhere(['pat_id_pat'=> $id_pat])
                                    ->one();

                                    echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$query["suma_grupal"].'" disabled></td>';


                                    $query = (new Query())
                                    ->select(['SUM(sesion_no_grupal) AS suma_no_grupal'])
                                    ->from('semana_real')
                                    ->where([
                                        'between', 'orden_semana', 7, 11
                                    ])
                                    ->andWhere(['tutor_id_tutor' => $id_tutor])
                                    ->andWhere(['pat_id_pat'=> $id_pat])
                                    ->one();

                                    echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$query["suma_no_grupal"].'" disabled></td>';

                                    $query = (new Query())
                                    ->select(['SUM(tutorados_atendidos) AS suma_tutorados'])
                                    ->from('semana_real')
                                    ->where([
                                        'between', 'orden_semana', 7, 11
                                    ])
                                    ->andWhere(['tutor_id_tutor' => $id_tutor])
                                    ->andWhere(['pat_id_pat'=> $id_pat])
                                    ->one();

                                    echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$query["suma_tutorados"].'" disabled></td>';

                                    $query = (new Query())
                                    ->select(['SUM(mujeres) AS suma_mujeres'])
                                    ->from('semana_real')
                                    ->where([
                                        'between', 'orden_semana', 7, 11
                                    ])
                                    ->andWhere(['tutor_id_tutor' => $id_tutor])
                                    ->andWhere(['pat_id_pat'=> $id_pat])
                                    ->one();

                                    echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$query["suma_mujeres"].'" disabled></td>';

                                    $query = (new Query())
                                    ->select(['SUM(hombres) AS suma_hombres'])
                                    ->from('semana_real')
                                    ->where([
                                        'between', 'orden_semana', 7, 11
                                    ])
                                    ->andWhere(['tutor_id_tutor' => $id_tutor])
                                    ->andWhere(['pat_id_pat'=> $id_pat])
                                    ->one();

                                    echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$query["suma_hombres"].'" disabled></td>';

                                    $query = (new Query())
                                    ->select(['SUM(faltas) AS suma_faltas'])
                                    ->from('semana_real')
                                    ->where([
                                        'between', 'orden_semana', 7, 11
                                    ])
                                    ->andWhere(['tutor_id_tutor' => $id_tutor])
                                    ->andWhere(['pat_id_pat'=> $id_pat])
                                    ->one();

                                    echo '<td><input type="number" class="form-group form-group-sm col-6" placeholder="0" value="'.$query["suma_faltas"].'" disabled></td>';

                                    $nombresParcial = "Segunda";
                                    $inicio = 7;
                                    $final = 11;
                                    echo '<td>'.Html::a('PDF', ['site/report', 'id_pat'=>$id_pat, 'id_tutor'=>$id_tutor, 'parcial'=>$nombresParcial, 'inicio'=>$inicio, 'final'=>$final], ['class' => 'btn btn-info']).'</td>';

                                    ?>

                                </tr>
                            </tbody>
                            <tbody class="border">
                                <tr>
                                    <th rowspan="2">Tercera entrega de parcial</th>
                                    <td>T. Horas grupales</td>
                                    <td>T. Horas individuales</td>
                                    <td>T. Horas no impartidas</td>
                                    <td>T. Mujeres</td>
                                    <td>T. Hombres</td>
                                    <td>Num. Alumnos que faltaron en las sesiones</td>
                                    <th>Reporte</th>
                                </tr>
                                <tr>
                                <?php
                                    $query = (new Query())
                                    ->select(['SUM(sesion_grupal) AS suma_grupal'])
                                    ->from('semana_real')
                                    ->where([
                                        'between', 'orden_semana', 12, 17
                                    ])
                                    ->andWhere(['tutor_id_tutor' => $id_tutor])
                                    ->andWhere(['pat_id_pat'=> $id_pat])
                                    ->one();

                                    echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$query["suma_grupal"].'" disabled></td>';


                                    $query = (new Query())
                                    ->select(['SUM(sesion_no_grupal) AS suma_no_grupal'])
                                    ->from('semana_real')
                                    ->where([
                                        'between', 'orden_semana', 12, 17
                                    ])
                                    ->andWhere(['tutor_id_tutor' => $id_tutor])
                                    ->andWhere(['pat_id_pat'=> $id_pat])
                                    ->one();

                                    echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$query["suma_no_grupal"].'" disabled></td>';

                                    $query = (new Query())
                                    ->select(['SUM(tutorados_atendidos) AS suma_tutorados'])
                                    ->from('semana_real')
                                    ->where([
                                        'between', 'orden_semana', 12, 17
                                    ])
                                    ->andWhere(['tutor_id_tutor' => $id_tutor])
                                    ->andWhere(['pat_id_pat'=> $id_pat])
                                    ->one();

                                    echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$query["suma_tutorados"].'" disabled></td>';

                                    $query = (new Query())
                                    ->select(['SUM(mujeres) AS suma_mujeres'])
                                    ->from('semana_real')
                                    ->where([
                                        'between', 'orden_semana', 12, 17
                                    ])
                                    ->andWhere(['tutor_id_tutor' => $id_tutor])
                                    ->andWhere(['pat_id_pat'=> $id_pat])
                                    ->one();

                                    echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$query["suma_mujeres"].'" disabled></td>';

                                    $query = (new Query())
                                    ->select(['SUM(hombres) AS suma_hombres'])
                                    ->from('semana_real')
                                    ->where([
                                        'between', 'orden_semana', 12, 17
                                    ])
                                    ->andWhere(['tutor_id_tutor' => $id_tutor])
                                    ->andWhere(['pat_id_pat'=> $id_pat])
                                    ->one();

                                    echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$query["suma_hombres"].'" disabled></td>';

                                    $query = (new Query())
                                    ->select(['SUM(faltas) AS suma_faltas'])
                                    ->from('semana_real')
                                    ->where([
                                        'between', 'orden_semana', 12, 17
                                    ])
                                    ->andWhere(['tutor_id_tutor' => $id_tutor])
                                    ->andWhere(['pat_id_pat'=> $id_pat])
                                    ->one();

                                    echo '<td><input type="number" class="form-group form-group-sm col-6" placeholder="0" value="'.$query["suma_faltas"].'" disabled></td>';

                                    $nombresParcial = "Segunda";
                                    $inicio = 12;
                                    $final = 17;
                                    echo '<td>'.Html::a('PDF', ['site/report', 'id_pat'=>$id_pat, 'id_tutor'=>$id_tutor, 'parcial'=>$nombresParcial, 'inicio'=>$inicio, 'final'=>$final], ['class' => 'btn btn-info']).'</td>';

                                    ?>
                                </tr>
                            </tbody>
                            <tbody class="border">
                                <tr>
                                    <th>Total</th>
                                    <?php
                                    $query = (new Query())
                                    ->select(['SUM(sesion_grupal) AS suma_grupal'])
                                    ->from('semana_real')
                                    ->where([
                                        'between', 'orden_semana', 1, 17
                                    ])
                                    ->andWhere(['tutor_id_tutor' => $id_tutor])
                                    ->andWhere(['pat_id_pat'=> $id_pat])
                                    ->one();

                                    echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$query["suma_grupal"].'" disabled></td>';


                                    $query = (new Query())
                                    ->select(['SUM(sesion_no_grupal) AS suma_no_grupal'])
                                    ->from('semana_real')
                                    ->where([
                                        'between', 'orden_semana', 1, 17
                                    ])
                                    ->andWhere(['tutor_id_tutor' => $id_tutor])
                                    ->andWhere(['pat_id_pat'=> $id_pat])
                                    ->one();

                                    echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$query["suma_no_grupal"].'" disabled></td>';

                                    $query = (new Query())
                                    ->select(['SUM(tutorados_atendidos) AS suma_tutorados'])
                                    ->from('semana_real')
                                    ->where([
                                        'between', 'orden_semana', 1, 17
                                    ])
                                    ->andWhere(['tutor_id_tutor' => $id_tutor])
                                    ->andWhere(['pat_id_pat'=> $id_pat])
                                    ->one();

                                    echo '<td><input type="number" class="form-group form-group-sm col-8" placeholder="0" value="'.$query["suma_tutorados"].'" disabled></td>';

                                    $query = (new Query())
                                    ->select(['SUM(mujeres) AS suma_mujeres'])
                                    ->from('semana_real')
                                    ->where([
                                        'between', 'orden_semana', 1, 17
                                    ])
                                    ->andWhere(['tutor_id_tutor' => $id_tutor])
                                    ->andWhere(['pat_id_pat'=> $id_pat])
                                    ->one();

                                    echo '<td><input type="number" class="form-group form-group-sm col-9" placeholder="0" value="'.$query["suma_mujeres"].'" disabled></td>';

                                    $query = (new Query())
                                    ->select(['SUM(hombres) AS suma_hombres'])
                                    ->from('semana_real')
                                    ->where([
                                        'between', 'orden_semana', 1, 17
                                    ])
                                    ->andWhere(['tutor_id_tutor' => $id_tutor])
                                    ->andWhere(['pat_id_pat'=> $id_pat])
                                    ->one();

                                    echo '<td><input type="number" class="form-group form-group-sm col-9" placeholder="0" value="'.$query["suma_hombres"].'" disabled></td>';

                                    $query = (new Query())
                                    ->select(['SUM(faltas) AS suma_faltas'])
                                    ->from('semana_real')
                                    ->where([
                                        'between', 'orden_semana', 1, 17
                                    ])
                                    ->andWhere(['tutor_id_tutor' => $id_tutor])
                                    ->andWhere(['pat_id_pat'=> $id_pat])
                                    ->one();

                                    echo '<td><input type="number" class="form-group form-group-sm col-9" placeholder="0" value="'.$query["suma_faltas"].'" disabled></td>';

 /*                                    $nombresParcial = "Segunda";
                                    $inicio = 1;
                                    $final = 17;
                                    echo '<td>'.Html::a('PDF', ['site/pdf', 'id_pat'=>$id_pat, 'id_tutor'=>$id_tutor, 'parcial'=>$nombresParcial, 'inicio'=>$inicio, 'final'=>$final], ['class' => 'btn btn-info']).'</td>';
 */
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


    <div class="text-center ">
        <?= Html::a('Generar reporte final', ['site/pdf', 'id_pat'=>$id_pat, 'id_tutor'=>$id_tutor, 'parcial'=>$nombresParcial, 'inicio'=>1, 'final'=>17], ['class' => 'btn btn-info']) ?>
    </div>
        <?php } ?>
</div>

