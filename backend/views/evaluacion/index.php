<?php

use app\models\Evaluacion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\EvaluacionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Evaluacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evaluacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Evaluacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idevaluacion',
            'calificacion',
            'tutorado_idtutorado',
            'criterios_id_criterios',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Evaluacion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idevaluacion' => $model->idevaluacion]);
                 }
            ],
        ],
    ]); ?>


</div>
