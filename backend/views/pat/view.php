<?php

use yii\helpers\Html;
use yii\widgets\DetailView;



/** @var yii\web\View $this */
/** @var app\models\Pat $model */


/** @var yii\widgets\ActiveForm $form */

use app\models\Semana;

use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


/** @var app\models\search\SearchSemana $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = $model->id_pat;
$this->params['breadcrumbs'][] = ['label' => 'PATS', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pat-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_pat',
            'nombre',
        ],
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_semana',
            'semana',
            'tipo_tutoria',
            'tematica',
            'objetivos',
            //'justificacion',
            //'estrategias_tutor',
            //'acciones',
            //'estrategias_tutorado',
            //'pat_id_pat',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Semana $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_semana' => $model->id_semana]);
                    }
            ],
        ],
    ]); ?>

    <div class="row mt-4 mb-4">

        <div class="col text-center">
            <?= Html::a('Actualizar', ['update', 'id_pat' => $model->id_pat], ['class' => 'btn btn-primary w-100']) ?>
        </div>

        <div class="col text-center">
            <?= Html::a('Eliminar', ['delete', 'id_pat' => $model->id_pat], [
                'class' => 'btn btn-danger w-100',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>

    </div>


</div>
