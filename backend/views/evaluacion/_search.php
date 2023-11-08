<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\EvaluacionSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="evaluacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idevaluacion') ?>

    <?= $form->field($model, 'calificacion') ?>

    <?= $form->field($model, 'tutorado_idtutorado') ?>

    <?= $form->field($model, 'criterios_id_criterios') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
