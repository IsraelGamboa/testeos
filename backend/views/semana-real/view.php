<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\SemanaReal $model */

$this->title = $model->idsemana_real;
$this->params['breadcrumbs'][] = ['label' => 'Semana Reals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="semana-real-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idsemana_real' => $model->idsemana_real], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idsemana_real' => $model->idsemana_real], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idsemana_real',
            'sesion_grupal',
            'sesion_no_grupal',
            'tutorados_atendidos',
            'faltas',
            'total_grupo',
            'hombres',
            'mujeres',
            'total_tutorados',
            'evidencias',
            'observaciones:ntext',
            'semana_id_semana',
        ],
    ]) ?>

</div>
