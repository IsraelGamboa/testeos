<?php

use app\models\Semana;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;


use kartik\bs4dropdown\Dropdown;



/** @var yii\web\View $this */
/** @var app\models\search\SearchSemana $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Semanas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semana-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Semana', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    $gridColumns = [
    [
        'class'=>'kartik\grid\SerialColumn',
        'contentOptions'=>['class'=>'kartik-sheet-style'],
        'width'=>'36px',
        'pageSummary'=>'Total',
        'pageSummaryOptions' => ['colspan' => 6],
        'header'=>'',
        'headerOptions'=>['class'=>'kartik-sheet-style']
    ],

    [
        'class' => 'kartik\grid\ExpandRowColumn',
        'width' => '50px',
        'value' => function ($model, $key, $index, $column) {
            return GridView::ROW_COLLAPSED;
        },
        // show row expanded for even numbered keys
        'detail' => function ($model, $key, $index, $column) {
            // Contenido detallado que se mostrará cuando se expanda la fila.
            return Yii::$app->controller->renderPartial('details', ['model' => $model]);
        },
        
        'headerOptions' => ['class' => 'kartik-sheet-style'], 
    ],
    [
        'attribute' => 'semana',
        'vAlign' => 'middle',
        'hAlign' => 'center',

    ],
    [
        'attribute' => 'tipo_tutoria',
        'vAlign' => 'middle',
        'hAlign' => 'center',

    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::toRoute([$action, 'id_semana' => $model->id_semana]);
        }
    ],


    ];


    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns, // check this value by clicking GRID COLUMNS SETUP button at top of the page
        'headerContainer' => ['style' => 'top:50px', 'class' => 'kv-table-header'], // offset from top
        'floatHeader' => true, // table header floats when you scroll
        'floatPageSummary' => true, // table page summary floats when you scroll
        'floatFooter' => false, // disable floating of table footer
        'pjax' => false, // pjax is set to always false for this demo
        // parameters from the demo form
        'responsive' => false,
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
        // set export properties
        'export' => [
            'fontAwesome' => true
        ],
        'exportConfig' => [
            'html' => [],
            'csv' => [],
            'txt' => [],
            'xls' => [],

            'json' => [],
        ],
        // set your toolbar
        'toolbar' =>  [
            [
                'content' =>
                
                    Html::a('<i class="fas fa-plus"></i>', ['create'], [
                        'class' => 'btn btn-success',
                        'title'=>Yii::t('kvgrid', 'Add book'),
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



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'width' => '50px',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column) {
                    // Contenido detallado que se mostrará cuando se expanda la fila.
                    return Yii::$app->controller->renderPartial('details', ['model' => $model]);
                },
            ],
            // Otras columnas de datos aquí
            //'id_semana',
            'semana',
            'tipo_tutoria',
            'tematica',
            'objetivos',
            // Resto de las columnas
            [
                'class' => 'kartik\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::toRoute([$action, 'id_semana' => $model->id_semana]);
                }
            ],
        ],
    ]);?> 


</div>
