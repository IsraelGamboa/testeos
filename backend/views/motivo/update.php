<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Motivo $model */

$this->title = 'Update Motivo: ' . $model->id_motivo;
$this->params['breadcrumbs'][] = ['label' => 'Motivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_motivo, 'url' => ['view', 'id_motivo' => $model->id_motivo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="motivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
