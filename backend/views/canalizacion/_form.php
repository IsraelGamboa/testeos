<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\editors\Summernote;


/** @var yii\web\View $this */
/** @var app\models\Canalizacion $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="canalizacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_tutorado')->dropDownList($model->getTutorados($model->grupo_id_grupo), ['prompt' => 'Seleccionar alumno'] ) ?>

    <?= $form->field($model, 'asunto')->widget(Summernote::class, [
    'useKrajeePresets' => true,
    'pluginOptions' => [
        'height' => 50,
    ],
    ])?>

    <?= $form->field($model, 'cuerpo')->widget(Summernote::class, [
    'useKrajeePresets' => true,
    'pluginOptions' => [
        'height' => 300,
    ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
