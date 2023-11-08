<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evaluacion".
 *
 * @property int $idevaluacion
 * @property int $calificacion
 * @property int $tutorado_idtutorado
 * @property int $criterios_id_criterios
 *
 * @property Criterios $criteriosIdCriterios
 * @property Tutorado $tutoradoIdtutorado
 */
class Evaluacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evaluacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['calificacion', 'tutorado_idtutorado', 'criterios_id_criterios'], 'required'],
            [['calificacion', 'tutorado_idtutorado', 'criterios_id_criterios'], 'integer'],
            [['criterios_id_criterios'], 'exist', 'skipOnError' => true, 'targetClass' => Criterios::class, 'targetAttribute' => ['criterios_id_criterios' => 'id_criterios']],
            [['tutorado_idtutorado'], 'exist', 'skipOnError' => true, 'targetClass' => Tutorado::class, 'targetAttribute' => ['tutorado_idtutorado' => 'idtutorado']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idevaluacion' => 'Idevaluacion',
            'calificacion' => 'Calificacion',
            'tutorado_idtutorado' => 'Tutorado Idtutorado',
            'criterios_id_criterios' => 'Criterios Id Criterios',
        ];
    }

    /**
     * Gets query for [[CriteriosIdCriterios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCriteriosIdCriterios()
    {
        return $this->hasOne(Criterios::class, ['id_criterios' => 'criterios_id_criterios']);
    }

    /**
     * Gets query for [[TutoradoIdtutorado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTutoradoIdtutorado()
    {
        return $this->hasOne(Tutorado::class, ['idtutorado' => 'tutorado_idtutorado']);
    }
}
