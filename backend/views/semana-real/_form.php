<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\SemanaReal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="semana-real-form">

    <?php
        $id_pat = Yii::$app->request->get('id_pat');
        $id_semana = Yii::$app->request->get('id_semana');
    ?>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    
    <?= $form->field($model, 'orden_semana')->textInput() ?>

    <?= $form->field($model, 'tipo_sesion')->textInput() ?>

    <?= $form->field($model, 'sesion')->textInput() ?>

    <?= $form->field($model, 'tutorados_atendidos')->textInput() ?>

    <?= $form->field($model, 'faltas_tutorados')->textInput() ?>

    <?= $form->field($model, 'total_grupo')->textInput() ?>

    <?= $form->field($model, 'hombres')->textInput() ?>

    <?= $form->field($model, 'mujeres')->textInput() ?>

    <?= $form->field($model, 'total_tutorados')->textInput() ?>

    <!-- Widget Krajee fileInput multiple -->
    <?php 
    /* Condicional si existe la semana real muestra un input, si no existe muestra otro */
    if(isset($model->idsemana_real)){

        if(!empty($model->evidencias)){
            $path = $model->evidencias;
            if($path[0] == ','){
                $path=substr($path, 1);
            }
            $existingImages = explode(',', $path);
            $existingImagesData = [];
            

            if(!empty($existingImages[0])){
                foreach ($existingImages as $image) {
                    $existingImagesData[] = 'data:image/jpeg;base64,' . base64_encode(file_get_contents(Yii::getAlias('@evidenciasPath') . $image));                
                }
            }

            $cont = count($existingImages);
            $initialConfig = [];
            foreach($existingImages as $img){
                $nameImage = str_replace('../img/evidencias/', '',$img);
                $initialConfig[] = [
                    'caption' => $nameImage,
                    'size' => filesize($img),
                    'showRemove' => true,
                    'url' => Url::toRoute(['semana-real/delete-image', 'img_name'=>$nameImage, 'idsemana_real'=>$model->idsemana_real]),
                    'key' => $model->idsemana_real, 
                ];
            }


            echo $form->field($model, 'evidencias')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*', 'multiple' => true],
                'class'=>'inputFile',
                'pluginOptions' => [
                    'class'=>'inputFile',
                    'initialPreview' => $existingImagesData, // Muestra las evidencias
                    'initialPreviewConfig' => $initialConfig,
                    'encodeUrl'=>false,
                    'initialPreviewAsData'=>true,
                    'overwriteInitial' => false, // Evitar el duplicado de evidencias
                    'showUpload' => false, // No mostrar el botón de carga
                    'showRemove' => false,
                    'url' => Url::toRoute(['semana-real/delete-image', 'idsemana_real'=>$model->idsemana_real]),
                ],
            ]); 
        }else{
            echo $form->field($model, 'evidencias')->widget(FileInput::classname(), ['options' => ['accept' => 'image/*', 'multiple' => true],]); 
        }
    }else{
        echo $form->field($model, 'evidencias')->widget(FileInput::classname(), ['options' => ['accept' => 'image/*', 'multiple' => true],]); 
    }
    ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'semana_id_semana')->textInput() ?>

    <?= $form->field($model, 'tutor_id_tutor')->textInput() ?>

    <?= $form->field($model, 'pat_id_pat')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>
