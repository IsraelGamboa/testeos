<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\LiberacionSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="liberacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idevaluacion') ?>

    <?= $form->field($model, 'op1') ?>

    <?= $form->field($model, 'op2') ?>

    <?= $form->field($model, 'op3') ?>

    <?= $form->field($model, 'op4') ?>

    <?php // echo $form->field($model, 'op5') ?>

    <?php // echo $form->field($model, 'op6') ?>

    <?php // echo $form->field($model, 'op7') ?>

    <?php // echo $form->field($model, 'tutorado_idtutorado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
