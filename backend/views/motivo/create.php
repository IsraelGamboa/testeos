<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Motivo $model */

$this->title = 'Create Motivo';
$this->params['breadcrumbs'][] = ['label' => 'Motivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motivo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
