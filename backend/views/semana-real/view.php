<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\SemanaReal $model */

$id_pat = Yii::$app->request->get('id_pat');
$id_semana = Yii::$app->request->get('id_semana');

if(isset($id_pat) && isset($id_semana)){
    $this->title = "Semana real";
    $this->params['breadcrumbs'][] = ['label' => 'Plan de accion tutorial', 'url' => ['pat/index']];
    $this->params['breadcrumbs'][] = ['label' => 'PAT '.$id_pat, 'url' => ['pat/update', 'id_pat' => $id_pat]];
    $this->params['breadcrumbs'][] = ['label' => 'Semana '.$id_semana, 'url' => ['semana/pat', 'id_semana' => $id_semana, 'id_pat'=>$id_pat]];
    $this->params['breadcrumbs'][] = $this->title;
}

\yii\web\YiiAsset::register($this);
?>
<div class="semana-real-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idsemana_real' => $model->idsemana_real], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idsemana_real' => $model->idsemana_real], [
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
            'idsemana_real',
            'sesion_grupal',
            'sesion_no_grupal',
            'tutorados_atendidos',
            'faltas',
            'total_grupo',
            'hombres',
            'mujeres',
            'total_tutorados',
            'evidencias',
            'observaciones:ntext',
            'semana_id_semana',
        ],
    ]) ?>

</div>
