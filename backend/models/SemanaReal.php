<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "semana_real".
 *
 * @property int $idsemana_real
 * @property int $orden_semana
 * @property int $tipo_sesion
 * @property int $sesion
 * @property int $tutorados_atendidos
 * @property int $faltas_tutorados
 * @property int $total_grupo
 * @property int $hombres
 * @property int $mujeres
 * @property int $total_tutorados
 * @property string $evidencias
 * @property string $observaciones
 * @property int $semana_id_semana
 * @property int $tutor_id_tutor
 * @property int $pat_id_pat
 *
 * @property Pat $patIdPat
 * @property Semana $semanaIdSemana
 * @property Tutor $tutorIdTutor
 */
class SemanaReal extends \yii\db\ActiveRecord
{
    public $image_path;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'semana_real';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orden_semana', 'tipo_sesion', 'sesion', 'tutorados_atendidos', 'faltas_tutorados', 'total_grupo', 'hombres', 'mujeres', 'total_tutorados', 'observaciones', 'semana_id_semana', 'tutor_id_tutor', 'pat_id_pat'], 'required'],
            [['orden_semana', 'tipo_sesion', 'sesion', 'tutorados_atendidos', 'faltas_tutorados', 'total_grupo', 'hombres', 'mujeres', 'total_tutorados', 'semana_id_semana', 'tutor_id_tutor', 'pat_id_pat'], 'integer'],
            [['observaciones'], 'string'],
            /* Se agrega "maxFiles" y la cantidad soportada */
            [['evidencias'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 10, 'on' => ['create']],
            [['evidencias'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 10, 'on' => ['update']],
            [['evidencias'], 'safe', 'on' => ['update']],
            [['pat_id_pat'], 'exist', 'skipOnError' => true, 'targetClass' => Pat::class, 'targetAttribute' => ['pat_id_pat' => 'id_pat']],
            [['semana_id_semana'], 'exist', 'skipOnError' => true, 'targetClass' => Semana::class, 'targetAttribute' => ['semana_id_semana' => 'id_semana']],
            [['tutor_id_tutor'], 'exist', 'skipOnError' => true, 'targetClass' => Tutor::class, 'targetAttribute' => ['tutor_id_tutor' => 'id_tutor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idsemana_real' => 'Idsemana Real',
            'orden_semana' => 'Orden Semana',
            'tipo_sesion' => 'Tipo Sesion',
            'sesion' => 'Sesion',
            'tutorados_atendidos' => 'Tutorados Atendidos',
            'faltas_tutorados' => 'Faltas Tutorados',
            'total_grupo' => 'Total Grupo',
            'hombres' => 'Hombres',
            'mujeres' => 'Mujeres',
            'total_tutorados' => 'Total Tutorados',
            'evidencias' => 'Evidencias',
            'observaciones' => 'Observaciones',
            'semana_id_semana' => 'Semana Id Semana',
            'tutor_id_tutor' => 'Tutor Id Tutor',
            'pat_id_pat' => 'Pat Id Pat',
        ];
    }

    /**
     * Gets query for [[PatIdPat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatIdPat()
    {
        return $this->hasOne(Pat::class, ['id_pat' => 'pat_id_pat']);
    }

    /**
     * Gets query for [[SemanaIdSemana]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSemanaIdSemana()
    {
        return $this->hasOne(Semana::class, ['id_semana' => 'semana_id_semana']);
    }

    /**
     * Gets query for [[TutorIdTutor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTutorIdTutor()
    {
        return $this->hasOne(Tutor::class, ['id_tutor' => 'tutor_id_tutor']);
    }
}
