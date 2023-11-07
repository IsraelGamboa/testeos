<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Criterios $model */

$this->title = 'Create Criterios';
$this->params['breadcrumbs'][] = ['label' => 'Criterios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="criterios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
