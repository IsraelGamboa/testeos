<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ParcialGeneral $model */

$this->title = 'Create Parcial General';
$this->params['breadcrumbs'][] = ['label' => 'Parcial Generals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parcial-general-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
