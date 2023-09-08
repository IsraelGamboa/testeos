<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Semana $model */

$this->title = 'Update Semana: ' . $model->semana;
$this->params['breadcrumbs'][] = ['label' => 'Semanas', 'url' => ['semana/index', 'id_semana' => $model->id_semana]];
$this->params['breadcrumbs'][] = ['label' => $model->semana, 'url' => ['view', 'id_semana' => $model->id_semana]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="semana-update">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
