<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "motivo".
 *
 * @property int $id_motivo
 * @property string $nombre
 *
 * @property Diagnostico[] $diagnosticos
 */
class Motivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'motivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_motivo' => 'Id Motivo',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Diagnosticos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiagnosticos()
    {
        return $this->hasMany(Diagnostico::class, ['motivo_id_motivo' => 'id_motivo']);
    }
}
