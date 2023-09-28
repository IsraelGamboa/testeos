<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Diagnostico $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="diagnostico-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- Obtén los motivos disponibles desde la tabla Motivo -->
    <?php 
    
    $motivos = app\models\Motivo::find()->all(); 
    $motivosList = [];
    foreach ($motivos as $motivo) {
        $motivosList[$motivo->id_motivo] = $motivo->nombre; 
    }
    ?>

    <?= $form->field($model, 'matricula')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'asignatura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'especifique')->textInput(['maxlength' => true]) ?>

    <?php
    // Agrega el campo de selección en el formulario
    echo $form->field($model, 'motivo_id_motivo')->dropDownList(
        $motivosList, // Datos del dropdown
        ['prompt' => 'Selecciona un motivo'] 
    );
    ?>

    <?= $form->field($model, 'grupo_id_grupo')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
