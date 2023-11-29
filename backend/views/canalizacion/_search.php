<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\CanalizacionSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="canalizacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idcanalizacion') ?>

    <?= $form->field($model, 'asunto') ?>

    <?= $form->field($model, 'cuerpo') ?>

    <?= $form->field($model, 'grupo_id_grupo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
