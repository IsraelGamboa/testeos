<?php

use app\models\Canalizacion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\CanalizacionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Canalizacions';
$this->params['breadcrumbs'][] = $this->title;

$id_grupo = Yii::$app->request->get('id_grupo');

?>
<div class="canalizacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Canalizacion', ['/canalizacion/create', 'id_grupo'=>$id_grupo], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idcanalizacion',
            //Llave de obtencion de nombre por id
            [
                'attribute'=>'id_tutorado',
                'content'=> function($model){
                    return $model->tutorado->nombre;
                }
            ],
            'asunto:html',
            //'cuerpo:html',
            'estado',
            //'grupo_id_grupo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Canalizacion $model, $key, $index, $column) {
                    //forma optima de optencion de URL
                    return Url::toRoute(['/canalizacion/'.$action, 'idcanalizacion' => $model->idcanalizacion]);
                 }
            ],
        ],
    ]); ?>


</div>
