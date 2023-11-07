<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Liberacion $model */

$this->title = $model->idevaluacion;
$this->params['breadcrumbs'][] = ['label' => 'Liberacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="liberacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idevaluacion' => $model->idevaluacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idevaluacion' => $model->idevaluacion], [
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
            'idevaluacion',
            'op1',
            'op2',
            'op3',
            'op4',
            'op5',
            'op6',
            'op7',
            'tutorado_idtutorado',
        ],
    ]) ?>

</div>
