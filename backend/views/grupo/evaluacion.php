<?php

use app\models\Criterios;
use app\models\Liberacion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var app\models\Liberacion $model */
/** @var yii\widgets\ActiveForm $form */
/** @var yii\web\View $this */
/** @var app\models\search\CriteriosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Liberacion: ';
$this->params['breadcrumbs'][] = ['label' => 'Grupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Grupo ".$model->id_grupo, 'url' => ['update', 'id_grupo' => $model->id_grupo]];
$this->params['breadcrumbs'][] = 'Liberacion';
?>
<style>
.t-head{
    font-size: 10px;
    text-align: center;
    width: 200px;
}
.t-body{
    font-size: 12px;
    text-align: center;
}
.thead{
    height: 200px;
}
.panel-head{
    background: #fef2cb;
    padding: 40px;
}
.panel-body{
    border: solid;
    border-color: #92d050;
    border-radius: 5px;
    padding: 15px;

}

</style>


<!-- Panel de informacion -->
<div class="col panel-head">
    <div class="row">
        <div class="col-12 text-center">
            <p>IMPORTANTE: PARA QUE PUEDA LIBERARSE AL ALUMNO, TENDRA QUE CUMPLIR MINIMO <u class="text-danger">EL NIVEL DE DESEMPEÑO BUENO</u> DE LO CONTRARIO NO SE AUTORIZA ESTE CREDITO COMPLEMENTARIO</p>
        </div>
    </div>
    <div class="row">
        <div class="text-center col-5 panel-body ml-5 mr-4">
            <p>Selecciona el nivel de desempeño alcanzado por el estudiante, 
                por cada uno de los 7 criterios a evaluar establecidos en el formato de evaluacion, 
                considerando que cada nivel de desempeño de criterio tiene una equivalencia numerica</p>
        </div>

        <div class="text-center col-5 panel-body ml-5 mr-5">
            <p>ESCALA DE VALORES</p>
            <P>Excelente=4 Notable=3 Bueno=2 Suficiente=1 Insuficiente=0</P>
            <p class="text-danger">NO PUEDE DEJAR NINGUN ESPACIO VACIO</p>
        </div>
    </div>

</div>



<!-- Tabla de evaluacion -->
<div class="table-responsive">
<?php $form = ActiveForm::begin(['action' => ['evaluacion/registro', 'id_grupo'=>$model->id_grupo], 'method' => 'post']); ?>
    <table>
        <thead class="border thead" style="background-color: #f1f7ed;">
            <tr>
                <th class="t-head border">Matricula</th>
                <th class="t-head border">Alumno</th>
                <?php
                    $models = $dataProvider->models;   
                    foreach($models as $modelo){
                        echo '<th class="t-head border">'.$modelo['nombre'].'</th>';
                    }
                ?>
                <th class="t-head border">VALOR NUMERICO DE LA ACTIVIDAD COMPLEMENTARIA</th>
                <th class="t-head border">NIVEL DE DESEMPEÑO ALCANZADO DE LA ACTIVIDAD COMPLEMENTARIA</th>
                <th class="t-head border">AUTORIZO SU LIBERACION COMO TUTOR(A)</th>
            </tr>
        </thead>
        <tbody class="border">


                <?php
                    echo '<input type="hidden" name="totalTutorados" value="'.$dataTutorado->count.'" >';
                    echo '<input type="hidden" name="totalCriterios" value="'.$dataProvider->count.'" >';
                    $models = $dataTutorado->models;
                    foreach ($models as $indext=>$tutorado) {
                        echo '<input type="hidden" name="tutorado'.$indext.'" value="'.$tutorado->idtutorado.'" >';
                        echo '<tr class="border">';
                        echo '<td class="t-body"><b>'.$tutorado['matricula'].'</b></td>';
                        echo '<td class="t-body"><b>'.$tutorado['nombre'].'</b></td>';
                        $models = $dataProvider->models;   
                        foreach($models as $indexc=>$criterio){
                            echo '<input type="hidden" name="criterio'.$indexc.'" value="'.$criterio->id_criterios.'" >';
                            echo '<td class="t-body">';
                            if($tutorado->evaluacions > 0){
                                echo '<select class="form-select" name="al'.$indext.'cal'.$indexc.'" type="number">';
                              foreach($tutorado->evaluacions as $criterio2){
                                if(intval($criterio2->criterios_id_criterios) == intval($criterio->id_criterios)){
                                    
                                    echo (intval($criterio2->calificacion) == 0) ? '<option selected value = "0">0</option>' : '<option value = "0">0</option>';
                                    echo (intval($criterio2->calificacion) == 1) ? '<option selected value = "1">1</option>' : '<option value = "1">1</option>';
                                    echo (intval($criterio2->calificacion) == 2) ? '<option selected value = "2">2</option>' : '<option value = "2">2</option>';
                                    echo (intval($criterio2->calificacion) == 3) ? '<option selected value = "3">3</option>' : '<option value = "3">3</option>';
                                    echo (intval($criterio2->calificacion) == 4) ? '<option selected value = "4">4</option>' : '<option value = "4">4</option>';
                                   
                                }
                              }
                              echo '</select>';
                            }else{
                                echo '<select class="form-select" name="al'.$indext.'cal'.$indexc.'" type="number">
                                <option selected value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>';
                            }
                            echo '</td>';
    
                        }


                        $numeros = [$liberacion->op1, $liberacion->op2, $liberacion->op3, $liberacion->op4, $liberacion->op5, $liberacion->op6, $liberacion->op7];

                        // Calcular la suma de los números
                        $suma = array_sum($numeros);
    
                        // Calcular la cantidad de números en el array
                        $cantidad = count($numeros);
    
                        // Calcular la media
                        $resultado = $suma/$cantidad;
    
                        $media = number_format($resultado, 2 , '.', '');
    
    
                        if ($media != 0){
                            echo '<td class="t-body">';
                            echo '<span><b>'.$media.'</b></span>';
                            echo '</td>';
                        } else{
                            echo '<td class="t-body">';
                            echo '<span><b>N/A</b></span>';
                            echo '</td>';
                        }
    
                        if ($media < 1) {
                            echo '<td class="t-body">';
                            echo '<span><b>INSUFICIENTE</b></span>';
                            echo '</td>';
                        } else if ($media < 1.5) {
                            echo '<td class="t-body">';
                            echo '<span><b>SUFICIENTE</b></span>';
                            echo '</td>';
                        } else if ($media < 2.5) {
                            echo '<td class="t-body">';
                            echo '<span><b>BUENO</b></span>';
                            echo '</td>';
                        } else if ($media < 3.5) {
                            echo '<td class="t-body">';
                            echo '<span><b>NOTABLE</b></span>';
                            echo '</td>';
                        } else if ($media <= 4) {
                            echo '<td class="t-body">';
                            echo '<span><b>EXCELENTE</b></span>';
                            echo '</td>';
                        } else {
                            echo '<td class="t-body">';
                            echo '<span><b>N/A</b></span>';
                            echo '</td>';
                        }
    
                        
                        if ($media < 1.5){
                            echo '<td class="t-body"><span><b>N/A</b></span></td>'; 
                        } else {
                            echo '<td class="t-body"><span><b>SI</b></span></td>';
                        }

                        echo '</tr>';
                    }


                ?>

        </tbody>
    </table>
</div>

    <div class="form-group py-3 text-center">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success w-50']) ?>
    </div>
    <div class="form-group py-3 text-center">
        <?= Html::a('Criterios', ['criterios/create'], ['class' => 'btn btn-danger']); ?>
    </div>

    <?php ActiveForm::end(); ?>

