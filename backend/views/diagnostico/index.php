<?php

use app\models\Diagnostico;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\SearchDiagnostico $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Diagnosticos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnostico-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Diagnostico', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_diagnostico',
            'asignatura',
            'otro',
            'especifique',
            'motivo_id_motivo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Diagnostico $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_diagnostico' => $model->id_diagnostico]);
                 }
            ],
        ],
    ]); ?>


</div>
