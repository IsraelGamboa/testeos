<?php

use app\models\Tutorado;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\TutoradoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tutorados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutorado-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tutorado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idtutorado',
            'nombre',
            'grupo_id_grupo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Tutorado $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idtutorado' => $model->idtutorado]);
                 }
            ],
        ],
    ]); ?>


</div>
