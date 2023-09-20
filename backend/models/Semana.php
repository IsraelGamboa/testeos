<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "semana".
 *
 * @property int $id_semana
 * @property int $semana
 * @property string $tipo_tutoria
 * @property string $tematica
 * @property string $objetivos
 * @property string $justificacion
 * @property string $estrategias_tutor
 * @property string $acciones
 * @property string $estrategias_tutorado
 * @property int $pat_id_pat
 *
 * @property Pat $patIdPat
 */
class Semana extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'semana';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['semana', 'tipo_tutoria', 'tematica', 'objetivos', 'justificacion', 'estrategias_tutor', 'acciones', 'estrategias_tutorado', 'pat_id_pat'], 'required'],
            [['semana', 'pat_id_pat'], 'integer'],
            [['tipo_tutoria'], 'string', 'max' => 50],
            [['tematica', 'objetivos', 'justificacion', 'estrategias_tutor', 'acciones', 'estrategias_tutorado'], 'string', 'max' => 4000],
            [['pat_id_pat'], 'exist', 'skipOnError' => true, 'targetClass' => Pat::class, 'targetAttribute' => ['pat_id_pat' => 'id_pat']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_semana' => 'Id Semana',
            'semana' => 'Semana',
            'tipo_tutoria' => 'Tipo de Tutoria',
            'tematica' => 'Tematica',
            'objetivos' => 'Objetivos',
            'justificacion' => 'Justificacion',
            'estrategias_tutor' => 'Estrategias Tutor',
            'acciones' => 'Acciones',
            'estrategias_tutorado' => 'Estrategias Tutorado',
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
}
