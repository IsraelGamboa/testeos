<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\SearchParcialGeneral $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="parcial-general-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_parcial_general') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'total_horas_ind') ?>

    <?= $form->field($model, 'total_horas_grup') ?>

    <?= $form->field($model, 'fecha_entrega') ?>

    <?php // echo $form->field($model, 'tutor_id_tutor') ?>

    <?php // echo $form->field($model, 'semana_real_idsemana_real') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
