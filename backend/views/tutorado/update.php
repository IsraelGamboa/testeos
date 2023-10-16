<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tutorado $model */

$this->title = 'Update Tutorado: ' . $model->idtutorado;
$this->params['breadcrumbs'][] = ['label' => 'Tutorados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtutorado, 'url' => ['view', 'idtutorado' => $model->idtutorado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tutorado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
