<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Diagnostico $model */

$this->title = $model->id_diagnostico;
$this->params['breadcrumbs'][] = ['label' => 'Diagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="diagnostico-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_diagnostico' => $model->id_diagnostico], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_diagnostico' => $model->id_diagnostico], [
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
            'id_diagnostico',
            'asignatura',
            'otro',
            'especifique',
            'motivo_id_motivo',
        ],
    ]) ?>

</div>
