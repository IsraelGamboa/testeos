<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Liberacion $model */

$this->title = 'Update Liberacion: ' . $model->idevaluacion;
$this->params['breadcrumbs'][] = ['label' => 'Liberacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idevaluacion, 'url' => ['view', 'idevaluacion' => $model->idevaluacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="liberacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
