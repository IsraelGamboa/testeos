<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Semana $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="semana-form">



    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'semana')->textInput() ?>

    <?= $form->field($model, 'tipo_tutoria')->textInput() ?>

    <?= $form->field($model, 'tematica')->textarea(['rows' => 8]) ?>

    <?= $form->field($model, 'objetivos')->textarea(['rows' => 8]) ?>

    <?= $form->field($model, 'justificacion')->textarea(['rows' => 8]) ?>

    <?= $form->field($model, 'estrategias_tutor')->textarea(['rows' => 8]) ?>

    <?= $form->field($model, 'acciones')->textarea(['rows' => 8]) ?>

    <?= $form->field($model, 'estrategias_tutorado')->textarea(['rows' => 8]) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
