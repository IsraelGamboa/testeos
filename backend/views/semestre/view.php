<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Semestre $model */

$this->title = $model->id_semestre;
$this->params['breadcrumbs'][] = ['label' => 'Semestres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="semestre-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_semestre' => $model->id_semestre], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_semestre' => $model->id_semestre], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_semestre',
            'nombre',
            'periodo',
        ],
    ]) ?>

</div>
