<?php

use app\models\Criterios;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\CriteriosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Liberacion: ';
$this->params['breadcrumbs'][] = ['label' => 'Grupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Grupo ".$model->id_grupo, 'url' => ['update', 'id_grupo' => $model->id_grupo]];
$this->params['breadcrumbs'][] = 'Liberacion';
?>

<div class="container">


<!-- GridView de test -->


<div class="table-responsive">

    <table>
        <thead class="border" style="background-color: #f1f7ed;">
            <tr>
                <th><h6>Matricula</h6></th>
                <th><h6>Alumno</h6></th>
                <?php
                    $models = $dataProvider->models;   
                    foreach($models as $modelo){
                        echo '<th><h6>'.$modelo['nombre'].'</h6></th>';
                    }
                ?>
                
            </tr>
        </thead>
        <tbody class="border">
            <tr>
            <?php
                $models = $dataTutorado->models;  
                foreach($models as $modelo){
                    echo '<tr>';
                    echo '<td>'.$modelo['matricula'].'</td>';
                    echo '<td>'.$modelo['nombre'].'</td>';

                    $models = $dataProvider->models; 
                    foreach($models as $modelo){
                        echo '<th><select name="" class="form-group form-group-sm col-8">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        </select></th>';
                    }
                    echo '</tr>';

                }

                ?>
            </tr>
        </tbody>
    </table>
</div>


</div>