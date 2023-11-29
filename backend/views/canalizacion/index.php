<?php

use app\models\Canalizacion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\CanalizacionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Canalizacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="canalizacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Canalizacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idcanalizacion',
            [
                'attribute'=>'id_tutorado',
                'content'=> function($model){
                    return $model->tutorado->nombre;
                }
            ],
            'asunto:html',
            'cuerpo:html',
            'estado',
            //'grupo_id_grupo',
            //Solo funciona en gridview, para el detailview es distinto
            [
                'attribute'=>'grupo_id_grupo',
                'content'=> function($model){
                    return $model->grupoIdGrupo->nombre;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Canalizacion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idcanalizacion' => $model->idcanalizacion]);
                 }
            ],
        ],
    ]); ?>


</div>
