<?php

use app\models\Motivo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\MotivoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Motivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motivo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Motivo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_motivo',
            'nombre',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Motivo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_motivo' => $model->id_motivo]);
                 }
            ],
        ],
    ]); ?>


</div>
