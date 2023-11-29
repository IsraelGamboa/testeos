<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Canalizacion $model */

$this->title = $model->idcanalizacion;
$this->params['breadcrumbs'][] = ['label' => 'Canalizacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="canalizacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idcanalizacion' => $model->idcanalizacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idcanalizacion' => $model->idcanalizacion], [
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
            'idcanalizacion',
            'asunto',
            'cuerpo',
            'grupo_id_grupo',
        ],
    ]) ?>

</div>
