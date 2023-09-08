<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SemanaReal $model */

$this->title = 'Create Semana Real';
$this->params['breadcrumbs'][] = ['label' => 'Semana Reals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semana-real-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
