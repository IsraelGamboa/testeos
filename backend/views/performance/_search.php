<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\PerformanceSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="performance-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'iddesempeño') ?>

    <?= $form->field($model, 'excelente') ?>

    <?= $form->field($model, 'bueno') ?>

    <?= $form->field($model, 'riesgo') ?>

    <?= $form->field($model, 'grupo_id_grupo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
