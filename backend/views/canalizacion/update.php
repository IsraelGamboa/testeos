<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Canalizacion $model */

$this->title = 'Update Canalizacion: ' . $model->idcanalizacion;
$this->params['breadcrumbs'][] = ['label' => 'Canalizacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcanalizacion, 'url' => ['view', 'idcanalizacion' => $model->idcanalizacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="canalizacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
