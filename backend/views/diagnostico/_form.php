<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Diagnostico $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="diagnostico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'asignatura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'especifique')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'motivo_id_motivo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
