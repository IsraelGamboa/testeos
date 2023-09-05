<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\SearchSemana $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="semana-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_semana') ?>

    <?= $form->field($model, 'semana') ?>

    <?= $form->field($model, 'tipo_tutoria') ?>

    <?= $form->field($model, 'tematica') ?>

    <?= $form->field($model, 'objetivos') ?>

    <?php // echo $form->field($model, 'justificacion') ?>

    <?php // echo $form->field($model, 'estrategias_tutor') ?>

    <?php // echo $form->field($model, 'acciones') ?>

    <?php // echo $form->field($model, 'estrategias_tutorado') ?>

    <?php // echo $form->field($model, 'pat_id_pat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
