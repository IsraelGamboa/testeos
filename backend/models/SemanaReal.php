<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "semana_real".
 *
 * @property int $idsemana_real
 * @property int $sesion_grupal
 * @property int $sesion_no_grupal
 * @property int $tutorados_atendidos
 * @property int $faltas
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
 * @property ParcialGeneral[] $parcialGenerals
 * @property Semana $semanaIdSemana
 * @property Tutor $tutorIdTutor
 * @property Pat $patIdPat
 */
class SemanaReal extends \yii\db\ActiveRecord
{
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
            [['orden_semana', 'sesion_grupal', 'sesion_no_grupal', 'tutorados_atendidos', 'faltas', 'total_grupo', 'hombres', 'mujeres', 'total_tutorados', 'evidencias', 'observaciones', 'semana_id_semana'], 'required'],
            [['orden_semana', 'sesion_grupal', 'sesion_no_grupal', 'tutorados_atendidos', 'faltas', 'total_grupo', 'hombres', 'mujeres', 'total_tutorados', 'semana_id_semana'], 'integer'],
            [['observaciones'], 'string'],
            [['evidencias'], 'string', 'max' => 120],
            [['semana_id_semana'], 'exist', 'skipOnError' => true, 'targetClass' => Semana::class, 'targetAttribute' => ['semana_id_semana' => 'id_semana']],
            [['tutor_id_tutor'], 'exist', 'skipOnError' => true, 'targetClass' => Tutor::class, 'targetAttribute' => ['tutor_id_tutor' => 'id_tutor']],
            [['tutor_id_tutor'], 'exist', 'skipOnError' => true, 'targetClass' => Pat::class, 'targetAttribute' => ['pat_id_pat' => 'id_pat']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idsemana_real' => 'Idsemana Real',
            'orden_semana' => 'Num. Semana',
            'sesion_grupal' => 'Grupal',
            'sesion_no_grupal' => 'No Grupal',
            'tutorados_atendidos' => 'T. Atendidos',
            'faltas' => 'Faltas',
            'total_grupo' => 'Total Grupo',
            'hombres' => 'Hombres',
            'mujeres' => 'Mujeres',
            'total_tutorados' => 'Total Tutorados',
            'evidencias' => 'Evidencias',
            'observaciones' => 'Observaciones',
            'semana_id_semana' => 'Semana Id Semana',
            'tutor_id_tutor' => 'Tutor Id tutor',
            'pat_id_pat' => 'Pat Id Pat',
        ];
    }

    /**
     * Gets query for [[ParcialGenerals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParcialGenerals()
    {
        return $this->hasMany(ParcialGeneral::class, ['semana_real_idsemana_real' => 'idsemana_real']);
    }

    /**
     * Gets query for [[SemanaIdSemana]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSemanaIdSemana($idsemana_real)
    {
        return $this->hasOne(Semana::class, ['id_semana' => 'semana_id_semana']);
    }
}
