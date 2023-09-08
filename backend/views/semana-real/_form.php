<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SemanaReal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="semana-real-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sesion_grupal')->textInput() ?>

    <?= $form->field($model, 'sesion_no_grupal')->textInput() ?>

    <?= $form->field($model, 'tutorados_atendidos')->textInput() ?>

    <?= $form->field($model, 'faltas')->textInput() ?>

    <?= $form->field($model, 'total_grupo')->textInput() ?>

    <?= $form->field($model, 'hombres')->textInput() ?>

    <?= $form->field($model, 'mujeres')->textInput() ?>

    <?= $form->field($model, 'total_tutorados')->textInput() ?>

    <?= $form->field($model, 'evidencias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
