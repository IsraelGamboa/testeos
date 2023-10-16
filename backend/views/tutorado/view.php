<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tutorado $model */

$this->title = $model->idtutorado;
$this->params['breadcrumbs'][] = ['label' => 'Tutorados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tutorado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idtutorado' => $model->idtutorado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idtutorado' => $model->idtutorado], [
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
            'idtutorado',
            'nombre',
            'grupo_id_grupo',
        ],
    ]) ?>

</div>
