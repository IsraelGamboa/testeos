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



<!--     <div class="row mt-4 mb-4">


        <?php //if(isset($model->id_semana)){ 
            ?> <div class="col text-center">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success w-100']) ?>
                </div>
            <?php
                //$id_pat = Yii::$app->request->get('id_pat');
                ?> <div class="col text-center">
                         //Html::a('Cancelar', ['/pat/update', 'id' => /* $id_pat */], ['class' => 'btn btn-danger w-100']) 
                    </div>
                <?php
        //}//else{
            ?> <div class="col text-center">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success w-100']) ?>
            </div>
        <?php
       // }
        ?>

    </div> -->

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success w-100']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
