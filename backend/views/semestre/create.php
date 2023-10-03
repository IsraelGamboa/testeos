<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Semestre $model */

$this->title = 'Create Semestre';
$this->params['breadcrumbs'][] = ['label' => 'Semestres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semestre-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
