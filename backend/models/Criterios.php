<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "criterios".
 *
 * @property int $id_criterios
 * @property string $nombre
 * @property int $puntaje
 *
 * @property Evaluacion[] $evaluacions
 */
class Criterios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'criterios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_criterios' => 'Id Criterios',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Evaluacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluacions()
    {
        return $this->hasMany(Evaluacion::class, ['criterios_id_criterios' => 'id_criterios']);
    }
}
