<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\SearchSemanaReal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="semana-real-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idsemana_real') ?>

    <?= $form->field($model, 'sesion_grupal') ?>

    <?= $form->field($model, 'sesion_no_grupal') ?>

    <?= $form->field($model, 'tutorados_atendidos') ?>

    <?= $form->field($model, 'faltas') ?>

    <?php // echo $form->field($model, 'total_grupo') ?>

    <?php // echo $form->field($model, 'hombres') ?>

    <?php // echo $form->field($model, 'mujeres') ?>

    <?php // echo $form->field($model, 'total_tutorados') ?>

    <?php // echo $form->field($model, 'evidencias') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'semana_id_semana') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
