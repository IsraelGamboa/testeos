<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diagnostico".
 *
 * @property int $id_diagnostico
 * @property string $asignatura
 * @property string $otro
 * @property string $especifique
 * @property int $motivo_id_motivo
 * @property int $grupo_id_grupo
 * @property int $excelente
 * @property int $bueno
 * @property int $riesgo
 *
 * @property Grupo $grupoIdGrupo
 * @property Motivo $motivoIdMotivo
 */
class Diagnostico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diagnostico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['matricula', 'nombre', 'asignatura', 'otro', 'especifique', 'motivo_id_motivo', 'grupo_id_grupo'], 'required'],
            [['matricula', 'motivo_id_motivo', 'grupo_id_grupo'], 'integer'],
            [['nombre', 'asignatura', 'otro', 'especifique'], 'string', 'max' => 150],
            [['grupo_id_grupo'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::class, 'targetAttribute' => ['grupo_id_grupo' => 'id_grupo']],
            [['motivo_id_motivo'], 'exist', 'skipOnError' => true, 'targetClass' => Motivo::class, 'targetAttribute' => ['motivo_id_motivo' => 'id_motivo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_diagnostico' => 'Id Diagnostico',
            'matricula' => 'Matricula',
            'nombre' => 'Alumno en alto riesgo',
            'asignatura' => 'Asignatura',
            'otro' => 'Otro',
            'especifique' => 'Especifique',
            'motivo_id_motivo' => 'Motivo',
            'grupo_id_grupo' => 'Grupo Id Grupo',
        ];
    }

    /**
     * Gets query for [[GrupoIdGrupo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoIdGrupo()
    {
        return $this->hasOne(Grupo::class, ['id_grupo' => 'grupo_id_grupo']);
    }

    /**
     * Gets query for [[MotivoIdMotivo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMotivoIdMotivo()
    {
        return $this->hasOne(Motivo::class, ['id_motivo' => 'motivo_id_motivo']);
    }
}
