<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tutor $model */

$this->title = 'Update Tutor: ' . $model->id_tutor;
$this->params['breadcrumbs'][] = ['label' => 'Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tutor, 'url' => ['view', 'id_tutor' => $model->id_tutor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tutor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
