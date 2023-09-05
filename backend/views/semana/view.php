<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Semana $model */

$this->title = $model->id_semana;
$this->params['breadcrumbs'][] = ['label' => 'Semanas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="semana-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_semana' => $model->id_semana], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_semana' => $model->id_semana], [
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
            'id_semana',
            'semana',
            'tipo_tutoria',
            'tematica',
            'objetivos',
            'justificacion',
            'estrategias_tutor',
            'acciones',
            'estrategias_tutorado',
            'pat_id_pat',
        ],
    ]) ?>

</div>
