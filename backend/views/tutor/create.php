<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tutor $model */

$this->title = 'Create Tutor';
$this->params['breadcrumbs'][] = ['label' => 'Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
