<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Semana $model */

$id_pat = Yii::$app->request->get('id_pat');

if(isset($id_pat)){
    $this->title = 'Semana programada';
    $this->params['breadcrumbs'][] = ['label' => 'Plan de accion tutorial', 'url' => ['pat/index']];
    $this->params['breadcrumbs'][] = ['label' => 'PAT '.$id_pat, 'url' => ['pat/update', 'id_pat' => $id_pat]];
    $this->params['breadcrumbs'][] = $this->title;
}else{
    echo "no existe";
}
?>
<div class="semana-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
