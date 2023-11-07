<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Criterios $model */

$this->title = 'Update Criterios: ' . $model->id_criterios;
$this->params['breadcrumbs'][] = ['label' => 'Criterios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_criterios, 'url' => ['view', 'id_criterios' => $model->id_criterios]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="criterios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
