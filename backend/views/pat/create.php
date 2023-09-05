<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pat $model */

$this->title = 'Crear PAT';
$this->params['breadcrumbs'][] = ['label' => 'PATS', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
