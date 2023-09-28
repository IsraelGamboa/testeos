<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Performance $model */

$this->title = 'Update Performance: ' . $model->iddesempeño;
$this->params['breadcrumbs'][] = ['label' => 'Performances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddesempeño, 'url' => ['view', 'iddesempeño' => $model->iddesempeño]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="performance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
