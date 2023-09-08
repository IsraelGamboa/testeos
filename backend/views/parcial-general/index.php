<?php

use app\models\ParcialGeneral;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\SearchParcialGeneral $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Parcial Generals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parcial-general-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Parcial General', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_parcial_general',
            'nombre',
            'total_horas_ind',
            'total_horas_grup',
            'fecha_entrega',
            //'tutor_id_tutor',
            //'semana_real_idsemana_real',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ParcialGeneral $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_parcial_general' => $model->id_parcial_general]);
                 }
            ],
        ],
    ]); ?>


</div>
