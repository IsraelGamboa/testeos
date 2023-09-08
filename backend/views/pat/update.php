<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pat $model */

use app\models\Semana;

use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\SearchSemana $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Actualizar PAT: ' . $model->id_pat;
$this->params['breadcrumbs'][] = ['label' => 'PATS', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pat, 'url' => ['view', 'id_pat' => $model->id_pat]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="pat-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?=Yii::$app->session->getFlash('success')?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


</div>
