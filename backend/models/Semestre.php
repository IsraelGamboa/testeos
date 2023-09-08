<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "semestre".
 *
 * @property int $id_semestre
 * @property string $nombre
 * @property string $periodo
 *
 * @property Ciclo[] $ciclos
 */
class Semestre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'semestre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'periodo'], 'required'],
            [['nombre'], 'string', 'max' => 150],
            //[['periodo'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_semestre' => 'Id Semestre',
            'nombre' => 'Nombre',
            //'periodo' => 'Periodo',
        ];
    }

    /**
     * Gets query for [[Ciclos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCiclos()
    {
        return $this->hasMany(Ciclo::class, ['semestre_id_semestre' => 'id_semestre']);
    }
}
