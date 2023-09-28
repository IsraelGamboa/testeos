<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Performance $model */

$this->title = $model->iddesempeño;
$this->params['breadcrumbs'][] = ['label' => 'Performances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="performance-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'iddesempeño' => $model->iddesempeño], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'iddesempeño' => $model->iddesempeño], [
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
            'iddesempeño',
            'excelente',
            'bueno',
            'riesgo',
            'grupo_id_grupo',
        ],
    ]) ?>

</div>
