<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tutorado $model */

$this->title = 'Create Tutorado';
$this->params['breadcrumbs'][] = ['label' => 'Tutorados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutorado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
