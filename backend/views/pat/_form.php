<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Pat $model */
/** @var yii\widgets\ActiveForm $form */

use app\models\Semana;

use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;


use kartik\bs4dropdown\Dropdown;


/** @var app\models\search\SearchSemana $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

if(isset($model->id_pat)){

    $this->title = 'Actualizar PAT: ' . $model->id_pat;
    $this->params['breadcrumbs'][] = ['label' => 'PATS', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->id_pat, 'url' => ['view', 'id_pat' => $model->id_pat]];
    $this->params['breadcrumbs'][] = 'Actualizar';
}else{

}

?>

<div class="pat-form">

    <?php $form = ActiveForm::begin(); ?>
    

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>


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
                    $maxSemanas = 16; // Puedes ajustar esto según tus necesidades
                    
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
                    if ($action === 'view') {
                        // Redireccionar a la acción 'view' en un controlador diferente
                        return Url::to(['/semana/view', 'id_semana' => $model->id_semana]);
                    } elseif ($action === 'update') {
                        // Redireccionar a la acción 'update' en un controlador diferente
                        return Url::to(['/semana/update', 'id_semana' => $model->id_semana]);
                    } elseif ($action === 'delete') {
                        // Redireccionar a la acción 'delete' en un controlador diferente
                        return Url::to(['/semana/delete', 'id_semana' => $model->id_semana]);
                    }
                    // Otras acciones y redirecciones personalizadas según sea necesario
                    return '';
                }
            ],

        
        ];
  
    ?>

    <p>
        <?php if(isset($model->id_pat)){ 
            
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => $gridColumns, // check this value by clicking GRID COLUMNS SETUP button at top of the page
                'headerContainer' => ['style' => 'top:0px', 'class' => 'kv-table-header'], // offset from top
                'floatHeader' => true, // table header floats when you scroll
                'floatPageSummary' => true, // table page summary floats when you scroll
                'floatFooter' => false, // disable floating of table footer
                'pjax' => false, // pjax is set to always false for this demo
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



        <?php } ?>
    </p>




    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success w-100']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
