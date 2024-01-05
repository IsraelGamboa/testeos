<?php

use yii\helpers\Html;
use yii\widgets\DetailView;



/** @var yii\web\View $this */
/** @var app\models\Pat $model */


/** @var yii\widgets\ActiveForm $form */

use app\models\Semana;

use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


/** @var app\models\search\SearchSemana $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = $model->id_pat;
$this->params['breadcrumbs'][] = ['label' => 'PATS', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<style>
    .data-table{
        font-size: 8px;
        width: 100%;
    }
    .td-size{
        width:200px;
    }
</style>

<div class="pat-view">



    <?php foreach ($dataProvider->models as $index => $semana): ?>
        <table class="data-table">
            <thead class="border text-center">
                <tr>
                    <th class="text-center border" style="background-color: #f4b083;" colspan="11">SEMANA <?=Html::encode($semana->semana)?> </th>
                </tr>
                <tr class="border">
                    <th rowspan="2">SEMANA PROGRAMADA</th>
                    <td class="td-size" style="background-color: #c5e0b3;">SEMANA</td>
                    <td class="td-size" style="background-color: #c5e0b3;">TIPO DE TUTORIA</td>
                    <td class="td-size" style="background-color: #c5e0b3;">TEMATICA(S)</td>
                    <td class="td-size" style="background-color: #c5e0b3;">OBJETIVO(S)</td>
                    <td class="td-size" style="background-color: #c5e0b3;">JUSTIFICACION</td>
                    <td class="td-size" style="background-color: #c5e0b3;">ESTRATEGIAS DEL TUTOR</td>
                    <td class="td-size" style="background-color: #c5e0b3;">ACCCIONES</td>
                    <td class="td-size" style="background-color: #c5e0b3;">ESTRATEGIAS DEL TUTORADO</td>
                </tr>
                <tr>
                    <td class="td-size"><?=Html::encode($semana->semana)?></td>
                    <td class="td-size"><?=Html::encode($semana->tipo_tutoria)?></td>
                    <td class="td-size"><?=Html::encode($semana->tematica)?></td>
                    <td class="td-size"><?=Html::encode($semana->objetivos)?></td>
                    <td class="td-size"><?=Html::encode($semana->justificacion)?></td>
                    <td class="td-size"><?=Html::encode($semana->estrategias_tutor)?></td>
                    <td class="td-size"><?=Html::encode($semana->acciones)?></td>
                    <td class="td-size"><?=Html::encode($semana->estrategias_tutorado)?></td>

                </tr>
            </thead>
            <tbody class="border text-center">

            <?php 
            
            $dataSemanaReal = null;
            foreach ($dataReal->models as $index => $semana_real):               
                if($semana->id_semana == $semana_real->semana_id_semana){         
                    $dataSemanaReal = $semana_real;


                break;
                }
                ?>
                    


                <?php endforeach; 
                
                if($dataSemanaReal != null){?>
                    <tr class="border">
                        <th rowspan="3">Real</th>
                        <td rowspan="2" class="td-size" style="background-color: #c5e0b3;">COLOQUE EL NÚMERO 1 SI NO SE DIO LA SESIÓN GRUPAL</td>
                        <td rowspan="2" class="td-size" style="background-color: #c5e0b3;">COLOQUE EL NÚMERO 1 SI SE DIO LA SESIÓN GRUPAL</td>


                        <td class="td-size" style="background-color: #c5e0b3;">CANTIDAD DE TUTORADOS ATENDIDOS </td>
                        <td class="td-size"><?=Html::encode($dataSemanaReal->tutorados_atendidos)?></td>

                        <td class="td-size" style="background-color: #c5e0b3;">HOMBRES</td>
                        <td class="td-size"><?=Html::encode($dataSemanaReal->hombres)?></td>
                        <td rowspan="2" class="td-size" style="background-color: #c5e0b3;">NOTA</td>
                        <td rowspan="2" class="td-size" style="background-color: #c5e0b3;">OBSERVACIONES</td>
                    </tr>


                    <tr>
                        <td class="td-size" style="background-color: #c5e0b3;">ALUMNOS FALTARON EN DIA DE LA SESIÓN</td>
                        <td class="td-size"><?=Html::encode($dataSemanaReal->faltas_tutorados)?></td>

                        <td class="td-size" style="background-color: #c5e0b3;">MUJERES</td>
                        <td class="td-size"><?=Html::encode($dataSemanaReal->mujeres)?></td>
                    </tr>

                    <tr>
                        <td class="td-size"><?=Html::encode($dataSemanaReal->sesion)?></td>
                        <td class="td-size"><?=Html::encode($dataSemanaReal->tipo_sesion)?></td>

                        <td class="td-size" style="background-color: #c5e0b3;">TOTAL</td>
                        <td class="td-size"><?=Html::encode($dataSemanaReal->total_grupo)?></td>
                        <td class="td-size" style="background-color: #c5e0b3;">TOTAL</td>
                        <td class="td-size"><?=Html::encode($dataSemanaReal->total_tutorados)?></td>
                        <td class="td-size"><?=Html::encode($dataSemanaReal->evidencias)?></td>
                        <td class="td-size"><?=Html::encode($dataSemanaReal->observaciones)?></td>
                    </tr>

                <?php
                }else{?>
                    <tr class="border">
                        <th rowspan="3">Real</th>
                        <td rowspan="2" class="td-size" style="background-color: #c5e0b3;">COLOQUE EL NÚMERO 1 SI NO SE DIO LA SESIÓN GRUPAL</td>
                        <td rowspan="2" class="td-size" style="background-color: #c5e0b3;">COLOQUE EL NÚMERO 1 SI SE DIO LA SESIÓN GRUPAL</td>


                        <td class="td-size" style="background-color: #c5e0b3;">CANTIDAD DE TUTORADOS ATENDIDOS </td>
                        <td class="td-size">H</td>

                        <td class="td-size" style="background-color: #c5e0b3;">HOMBRES</td>
                        <td class="td-size">H</td>
                        <td rowspan="2" class="td-size" style="background-color: #c5e0b3;">NOTA</td>
                        <td rowspan="2" class="td-size" style="background-color: #c5e0b3;">OBSERVACIONES</td>
                    </tr>


                    <tr>
                        <td class="td-size" style="background-color: #c5e0b3;">ALUMNOS FALTARON EN DIA DE LA SESIÓN</td>
                        <td class="td-size">H</td>

                        <td class="td-size" style="background-color: #c5e0b3;">MUJERES</td>
                        <td class="td-size">H</td>
                    </tr>

                    <tr>
                        <td class="td-size">H</td>
                        <td class="td-size">H</td>

                        <td class="td-size" style="background-color: #c5e0b3;">TOTAL</td>
                        <td class="td-size">H</td>
                        <td class="td-size" style="background-color: #c5e0b3;">TOTAL</td>
                        <td class="td-size">H</td>
                        <td class="td-size">H</td>
                        <td class="td-size">H</td>
                    </tr>                    
                    
                <?php
                }
                ?>
                

            </tbody>
        </table>

    <?php endforeach; ?>


</div>
