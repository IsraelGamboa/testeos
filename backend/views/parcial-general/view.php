<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ParcialGeneral $model */

$this->title = $model->id_parcial_general;
$this->params['breadcrumbs'][] = ['label' => 'Parcial Generals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="parcial-general-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_parcial_general' => $model->id_parcial_general], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_parcial_general' => $model->id_parcial_general], [
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
            'id_parcial_general',
            'nombre',
            'total_horas_ind',
            'total_horas_grup',
            'fecha_entrega',
            'tutor_id_tutor',
            'semana_real_idsemana_real',
        ],
    ]) ?>

</div>
