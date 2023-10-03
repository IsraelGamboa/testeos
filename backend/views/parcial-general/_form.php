<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ParcialGeneral $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="parcial-general-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_horas_ind')->textInput() ?>

    <?= $form->field($model, 'total_horas_grup')->textInput() ?>

    <?= $form->field($model, 'fecha_entrega')->textInput() ?>

    <?= $form->field($model, 'tutor_id_tutor')->textInput() ?>

    <?= $form->field($model, 'semana_real_idsemana_real')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
