<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SemanaReal $model */
/** @var app\models\Pat $model */

$id_pat = Yii::$app->request->get('id_pat');
$id_semana = Yii::$app->request->get('id_semana');

if(isset($id_pat)){
    $this->title = 'Semana real';
    $this->params['breadcrumbs'][] = ['label' => 'Plan de accion tutorial', 'url' => ['pat/index']];
    $this->params['breadcrumbs'][] = ['label' => 'PAT '.$id_pat, 'url' => ['pat/update', 'id_pat' => $id_pat]];
    $this->params['breadcrumbs'][] = ['label' => 'Semana '.$id_semana, 'url' => ['semana/pat', 'id_semana' => $id_semana, 'id_pat'=>$id_pat]];
    $this->params['breadcrumbs'][] = $this->title;
}else{
    echo "no existe";
}


?>
<div class="semana-real-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
