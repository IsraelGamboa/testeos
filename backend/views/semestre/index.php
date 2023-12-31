<?php

use app\models\Semestre;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\SearchSemestre $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Semestres';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semestre-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Semestre', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_semestre',
            'nombre',
            'periodo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Semestre $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_semestre' => $model->id_semestre]);
                 }
            ],
        ],
    ]); ?>


</div>
