<?php

use app\models\Criterios;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\CriteriosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Criterios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="criterios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Criterios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_criterios',
            'nombre',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Criterios $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_criterios' => $model->id_criterios]);
                 }
            ],
        ],
    ]); ?>


</div>
