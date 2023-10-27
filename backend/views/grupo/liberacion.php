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
    font-size: 8px;
    text-align: center;
}
.t-body{
    font-size: 12px;
    text-align: center;
}
.thead{
    width: 200px;
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

<div class="container">


<!-- GridView de test -->
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




<div class="table-responsive">
<?php $form = ActiveForm::begin(['action' => ['liberacion/create'], 'method' => 'post']); ?>
    <table>
        <thead class="border thead" style="background-color: #f1f7ed;">
            <tr>
                <th class="t-head">Matricula</th>
                <th class="t-head">Alumno</th>
                <?php
                    $models = $dataProvider->models;   
                    foreach($models as $modelo){
                        echo '<th class="t-head">'.$modelo['nombre'].'</th>';
                    }
                ?>
                <th class="t-head">VALOR NUMERICO DE LA ACTIVIDAD COMPLEMENTARIA</th>
                <th class="t-head">NIVEL DE DESEMPEÑO ALCANZADO DE LA ACTIVIDAD COMPLEMENTARIA</th>
                <th class="t-head">AUTORIZO SU LIBERACION COMO TUTOR(A)</th>
            </tr>
        </thead>
        <tbody class="border">
            <tr>
                <?php
                $models = $dataTutorado->models;
                foreach ($models as $modelo) {

                    $liberacion = Liberacion::findOne(['tutorado_idtutorado' => $modelo['idtutorado']]);

                    if ($liberacion === null) {
                        // Si no existe una entrada de liberación para este tutorado, crea una nueva
                        $liberacion = new Liberacion();
                        $liberacion->tutorado_idtutorado = $modelo['idtutorado'];
                    }

                    // Llena los campos de liberación con los valores del formulario
                    $liberacion->idevaluacion = $liberacion->idevaluacion;
                    $liberacion->op1 = $liberacion->op1;
                    $liberacion->op2 = $liberacion->op2;
                    $liberacion->op3 = $liberacion->op3;
                    $liberacion->op4 = $liberacion->op4;
                    $liberacion->op5 = $liberacion->op5;
                    $liberacion->op6 = $liberacion->op6;
                    $liberacion->op7 = $liberacion->op7;

                    // Valida el modelo antes de guardar
                    if (!$liberacion->validate()) {
                        // Handle validation errors, por ejemplo, muestra los errores al usuario
                        // Puedes usar $liberacionModel->getErrors() para obtener los errores de validación
                    } else {
                        // Guarda el modelo de liberación fuera del bucle
                        $liberacion->save();
                    }

                    echo '<tr>';
                    echo '<td class="t-body">'.$modelo['matricula'].'</td>';
                    echo '<td class="t-body">'.$modelo['nombre'].'</td>';

                    echo $form->field($liberacion, 'idevaluacion')->hiddenInput(['name' => 'datos[idevaluacion][]'])->label(false);

                    echo '<td>';
                    echo $form->field($liberacion, 'op1', [
                        'template' => '{input}',
                        'options' => ['class' => ''],
                        'inputOptions' => [
                            'name' => 'datos[op1][]',
                        ],
                    ])->dropDownList([0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4'], ['selected' => $liberacion->op1]);
                    echo '</td>';
                    

                    echo '<td>';
                    echo $form->field($liberacion, 'op2', [
                        'template' => '{input}',
                        'options' => ['class' => ''],
                        'inputOptions' => [
                            'name' => 'datos[op2][]',
                        ],
                    ])->dropDownList([0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4'], ['selected' => $liberacion->op2]);
                    echo '</td>';

                    echo '<td>';
                    echo $form->field($liberacion, 'op3', [
                        'template' => '{input}',
                        'options' => ['class' => ''],
                        'inputOptions' => [
                            'name' => 'datos[op3][]',
                        ],
                    ])->dropDownList([0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4'], ['selected' => $liberacion->op3]);
                    echo '</td>';

                    echo '<td>';
                    echo $form->field($liberacion, 'op4', [
                        'template' => '{input}',
                        'options' => ['class' => ''],
                        'inputOptions' => [
                            'name' => 'datos[op4][]',
                        ],
                    ])->dropDownList([0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4'], ['selected' => $liberacion->op4]);
                    echo '</td>';

                    echo '<td>';
                    echo $form->field($liberacion, 'op5', [
                        'template' => '{input}',
                        'options' => ['class' => ''],
                        'inputOptions' => [
                            'name' => 'datos[op5][]',
                        ],
                    ])->dropDownList([0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4'], ['selected' => $liberacion->op5]);
                    echo '</td>';

                    echo '<td>';
                    echo $form->field($liberacion, 'op6', [
                        'template' => '{input}',
                        'options' => ['class' => ''],
                        'inputOptions' => [
                            'name' => 'datos[op6][]',
                        ],
                    ])->dropDownList([0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4'], ['selected' => $liberacion->op6]);
                    echo '</td>';

                    echo '<td>';
                    echo $form->field($liberacion, 'op7', [
                        'template' => '{input}',
                        'options' => ['class' => ''],
                        'inputOptions' => [
                            'name' => 'datos[op7][]',
                        ],
                    ])->dropDownList([0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4'], ['selected' => $liberacion->op7]);
                    echo '</td>';


                    //clase: d-none para ocultar el imput
                    echo $form->field($liberacion, 'tutorado_idtutorado')->hiddenInput(['name' => 'datos[tutorado_idtutorado][]', 'value' => $modelo['idtutorado']])->label(false);


                    $numeros = [$liberacion->op1, $liberacion->op2, $liberacion->op3, $liberacion->op4, $liberacion->op5, $liberacion->op6, $liberacion->op7];

                    // Calcular la suma de los números
                    $suma = array_sum($numeros);

                    // Calcular la cantidad de números en el array
                    $cantidad = count($numeros);

                    $resultado = $suma/$cantidad;

                    $media = number_format($resultado, 2 , '.', '');



                    echo '<td class="t-body">';
                    echo '<input type="text" class="form-control" placeholder="N/A" value="'.$media.'" disabled>';
                    echo '</td>';
                    if ($media < 1) {
                        echo '<td>';
                        echo '<input type="text" class="form-control" placeholder="INSUFICIENTE" value="" disabled>';
                        echo '</td>';
                    } else if ($media < 1.5) {
                        echo '<td>';
                        echo '<input type="text" class="form-control" placeholder="SUFICIENTE" value="" disabled>';
                        echo '</td>';
                    } else if ($media < 2.5) {
                        echo '<td>';
                        echo '<input type="text" class="form-control" placeholder="BUENO" value="" disabled>';
                        echo '</td>';
                    } else if ($media < 3.5) {
                        echo '<td>';
                        echo '<input type="text" class="form-control" placeholder="NOTABLE" value="" disabled>';
                        echo '</td>';
                    } else if ($media <= 4) {
                        echo '<td>';
                        echo '<input type="text" class="form-control" placeholder="EXCELENTE" value="" disabled>';
                        echo '</td>';
                    } else {
                        echo '<td>';
                        echo '<input type="text" class="form-control" placeholder="N/A" value="" disabled>';
                        echo '</td>';
                    }

                    
                    if ($media < 1.5){
                        echo '<td class="t-body"><input type="text" class="form-control" placeholder="N/A" value="" disabled></td>'; 
                    } else {
                        echo '<td class="t-body"><input type="text" class="form-control" placeholder="SI" value="" disabled></td>';
                    }

                    echo '</tr>';
                }
                ?>

            </tr>
        </tbody>
    </table>
</div>

    <div class="form-group py-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>