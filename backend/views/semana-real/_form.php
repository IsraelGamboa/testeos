<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SemanaReal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="semana-real-form">

    <?php
        $id_pat = Yii::$app->request->get('id_pat');
        $id_semana = Yii::$app->request->get('id_semana');

        if(isset($id_pat) && isset($id_semana)){
            echo "existen los dos, ID pat: " . $id_pat . " ID semana: " . $id_semana;
        }
    ?>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'orden_semana')->textInput() ?>

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

    <?= $form->field($model, 'semana_id_semana')->textInput() ?>

    <?= $form->field($model, 'tutor_id_tutor')->textInput() ?>

    <?= $form->field($model, 'pat_id_pat')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
