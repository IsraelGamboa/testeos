<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ParcialGeneral $model */

$this->title = 'Update Parcial General: ' . $model->id_parcial_general;
$this->params['breadcrumbs'][] = ['label' => 'Parcial Generals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_parcial_general, 'url' => ['view', 'id_parcial_general' => $model->id_parcial_general]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="parcial-general-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
