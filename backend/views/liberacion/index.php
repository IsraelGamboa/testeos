<?php

use app\models\Liberacion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\LiberacionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Liberacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="liberacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Liberacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idevaluacion',
            'op1',
            'op2',
            'op3',
            'op4',
            //'op5',
            //'op6',
            //'op7',
            //'tutorado_idtutorado',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Liberacion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idevaluacion' => $model->idevaluacion]);
                 }
            ],
        ],
    ]); ?>


</div>
