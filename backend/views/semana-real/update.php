<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SemanaReal $model */

$this->title = 'Update Semana Real: ' . $model->idsemana_real;
$this->params['breadcrumbs'][] = ['label' => 'Semana Reals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsemana_real, 'url' => ['view', 'idsemana_real' => $model->idsemana_real]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="semana-real-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
