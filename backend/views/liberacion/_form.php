<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Liberacion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="liberacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-1"> 
            <?= $form->field($model, 'op1')->dropDownList([0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4']) ?>
        </div>

        <div class="col-1"> 
            <?= $form->field($model, 'op2')->dropDownList([0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4']) ?>
        </div>

        <div class="col-1"> 
            <?= $form->field($model, 'op3')->dropDownList([0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4']) ?>
        </div>

        <div class="col-1"> 
            <?= $form->field($model, 'op4')->dropDownList([0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4']) ?>
        </div>

        <div class="col-1"> 
            <?= $form->field($model, 'op5')->dropDownList([0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4']) ?>
        </div>

        <div class="col-1"> 
            <?= $form->field($model, 'op6')->dropDownList([0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4']) ?>
        </div>

        <div class="col-1"> 
            <?= $form->field($model, 'op7')->dropDownList([0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4']) ?>
        </div>

    </div>
    


    <?= $form->field($model, 'tutorado_idtutorado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
