<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Canalizacion $model */

$this->title = 'Create Canalizacion';
$this->params['breadcrumbs'][] = ['label' => 'Canalizacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="canalizacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
