<?php

use Yii;
use yii\db\Query;


?>

<div class="pat-form">

<?php 
$id_tutor = 1;
$id_pat = Yii::$app->request->get('id_pat');
$nombresParcial = Yii::$app->request->get('parcial');

$inicio = Yii::$app->request->get('inicio');
$final = Yii::$app->request->get('final');

echo "Id pat: ". $id_pat ." Id Tutor: " . $id_tutor . " Parcial: " . $nombresParcial . " Empieza la semana: " . $inicio . " Termina la semana: " . $final;
?>
    <div class="container py-3">
        <div class="table-responsive text-center">
        <!--<h1>hola</h1> -->
        <table class="table">
            <thead class="border">
                <th colspan="8"><h3>Concentrado de entregas de parciales</i></h3></th>
            </thead>
            <tbody class="border">
                <tr>
                    <th rowspan="2"><?php echo $nombresParcial?> entrega de parcial</th>
                    <td>Total de horas grupales</td>
                    <td>Total de horas individuales</td>
                    <td>Total de horas no impartidas</td>
                    <td>Total de mujeres</td>
                    <td>Total de hombres</td>
                    <td>Numero de alumnos que faltaron en las sesiones</td>
                    
                </tr>
                <tr>
                <?php 
                    $db = Yii::$app->db;
                    $query = (new Query())
                    ->select([
                        'SUM(semana_real.sesion_grupal) AS suma_grupal',
                        'SUM(semana_real.sesion_no_grupal) AS suma_no_grupal',
                        'SUM(semana_real.tutorados_atendidos) AS suma_tutorados',
                        'SUM(semana_real.mujeres) AS suma_mujeres',
                        'SUM(semana_real.hombres) AS suma_hombres',
                        'SUM(semana_real.faltas) AS suma_faltas',
                    ])
                    ->from('semana')
                    ->innerJoin('semana_real', 'semana.id_semana = semana_real.semana_id_semana')
                    ->where([
                        'and',
                        ['between', 'semana_real.orden_semana', $inicio, $final],
                        ['semana_real.pat_id_pat' => $id_pat],
                        ['semana_real.tutor_id_tutor' => $id_tutor],
                    ])
                    ->one();

                    echo '<td>'.$query["suma_grupal"].'</td>';

                    echo '<td>'.$query["suma_no_grupal"].'</td>';

                    echo '<td>'.$query["suma_tutorados"].'</td>';

                    echo '<td>'.$query["suma_mujeres"].'</td>';

                    echo '<td>'.$query["suma_hombres"].'</td>';

                    echo '<td>'.$query["suma_faltas"].'</td>';

                ?>

                </tr>
            </tbody>
        </table>
        </div>
    </div>

</div>
