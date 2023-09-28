<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\DiagnosticoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="diagnostico-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_diagnostico') ?>

    <?= $form->field($model, 'asignatura') ?>

    <?= $form->field($model, 'otro') ?>

    <?= $form->field($model, 'especifique') ?>

    <?= $form->field($model, 'motivo_id_motivo') ?>

    <?php // echo $form->field($model, 'grupo_id_grupo') ?>

    <?php // echo $form->field($model, 'excelente') ?>

    <?php // echo $form->field($model, 'bueno') ?>

    <?php // echo $form->field($model, 'riesgo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
