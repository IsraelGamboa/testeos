<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Diagnostico $model */

$this->title = 'Update Diagnostico: ' . $model->id_diagnostico;
$this->params['breadcrumbs'][] = ['label' => 'Diagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_diagnostico, 'url' => ['view', 'id_diagnostico' => $model->id_diagnostico]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="diagnostico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
