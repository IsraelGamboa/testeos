<?php

use app\models\Pat;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* use kartik\grid\GridView; */

/** @var yii\web\View $this */
/** @var app\models\search\SearchPat $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'PATS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pat-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_pat',
            'nombre',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pat $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_pat' => $model->id_pat]);
                 }
            ],
        ],
    ]); ?>

    <p>
        <?= Html::a('Crear PAT', ['create'], ['class' => 'btn btn-info w-100']) ?>
    </p>


</div>
