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
 *
 * @property Motivo $motivoIdMotivo
 * @property Perfil[] $perfils
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
            [['asignatura', 'otro', 'especifique', 'motivo_id_motivo'], 'required'],
            [['motivo_id_motivo'], 'integer'],
            [['asignatura', 'otro', 'especifique'], 'string', 'max' => 45],
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
            'asignatura' => 'Asignatura',
            'otro' => 'Otro',
            'especifique' => 'Especifique',
            'motivo_id_motivo' => 'Motivo Id Motivo',
        ];
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

    /**
     * Gets query for [[Perfils]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfils()
    {
        return $this->hasMany(Perfil::class, ['diagnostico_id_diagnostico' => 'id_diagnostico']);
    }
}
