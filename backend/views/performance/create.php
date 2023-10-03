<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Performance $model */

$this->title = 'Create Performance';
$this->params['breadcrumbs'][] = ['label' => 'Performances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="performance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
