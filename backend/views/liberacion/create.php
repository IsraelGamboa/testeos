<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Liberacion $model */

$this->title = 'Create Liberacion';
$this->params['breadcrumbs'][] = ['label' => 'Liberacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="liberacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
