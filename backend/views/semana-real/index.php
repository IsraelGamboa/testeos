<?php

use app\models\SemanaReal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\SearchSemanaReal $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Semana Reals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semana-real-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Semana Real', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idsemana_real',
            'orden_semana',
            'tipo_sesion',
            'sesion',
            'tutorados_atendidos',
            'faltas_tutorados ',
            //'total_grupo',
            //'hombres',
            //'mujeres',
            //'total_tutorados',
            //'evidencias',
            //'observaciones:ntext',
            'semana_id_semana',
            'tutor_id_tutor',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, SemanaReal $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idsemana_real' => $model->idsemana_real]);
                 }
            ],
        ],
    ]); ?>


</div>
