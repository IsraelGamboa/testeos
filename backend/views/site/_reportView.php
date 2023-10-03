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
                        ->select(['SUM(sesion_grupal) AS suma_grupal'])
                        ->from('semana_real')
                        ->where([
                            'between', 'orden_semana', $inicio, $final
                        ])
                        ->andWhere(['tutor_id_tutor' => $id_tutor])
                        ->andWhere(['pat_id_pat'=> $id_pat])
                        ->one();

                        echo '<td>'.$query["suma_grupal"].'</td>';
                        

                        $query = (new Query())
                        ->select(['SUM(sesion_no_grupal) AS suma_no_grupal'])
                        ->from('semana_real')
                        ->where([
                            'between', 'orden_semana', $inicio, $final
                        ])
                        ->andWhere(['tutor_id_tutor' => $id_tutor])
                        ->andWhere(['pat_id_pat'=> $id_pat])
                        ->one();

                        echo '<td>'.$query["suma_no_grupal"].'</td>';

                        $query = (new Query())
                        ->select(['SUM(tutorados_atendidos) AS suma_tutorados'])
                        ->from('semana_real')
                        ->where([
                            'between', 'orden_semana', $inicio, $final
                        ])
                        ->andWhere(['tutor_id_tutor' => $id_tutor])
                        ->andWhere(['pat_id_pat'=> $id_pat])
                        ->one();

                        echo '<td>'.$query["suma_tutorados"].'</td>';

                        $query = (new Query())
                        ->select(['SUM(mujeres) AS suma_mujeres'])
                        ->from('semana_real')
                        ->where([
                            'between', 'orden_semana', $inicio, $final
                        ])
                        ->andWhere(['tutor_id_tutor' => $id_tutor])
                        ->andWhere(['pat_id_pat'=> $id_pat])
                        ->one();

                        echo '<td>'.$query["suma_mujeres"].'</td>';

                        $query = (new Query())
                        ->select(['SUM(hombres) AS suma_hombres'])
                        ->from('semana_real')
                        ->where([
                            'between', 'orden_semana', $inicio, $final
                        ])
                        ->andWhere(['tutor_id_tutor' => $id_tutor])
                        ->andWhere(['pat_id_pat'=> $id_pat])
                        ->one();

                        echo '<td>'.$query["suma_hombres"].'</td>';

                        $query = (new Query())
                        ->select(['SUM(faltas) AS suma_faltas'])
                        ->from('semana_real')
                        ->where([
                            'between', 'orden_semana', $inicio, $final
                        ])
                        ->andWhere(['tutor_id_tutor' => $id_tutor])
                        ->andWhere(['pat_id_pat'=> $id_pat])
                        ->one();

                        echo '<td>'.$query["suma_faltas"].'</td>';

                ?>

                </tr>
            </tbody>
        </table>
        </div>
    </div>

</div>
