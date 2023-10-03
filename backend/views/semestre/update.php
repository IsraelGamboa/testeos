<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Semestre $model */

$this->title = 'Update Semestre: ' . $model->id_semestre;
$this->params['breadcrumbs'][] = ['label' => 'Semestres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_semestre, 'url' => ['view', 'id_semestre' => $model->id_semestre]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="semestre-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
