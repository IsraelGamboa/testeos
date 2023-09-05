<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pat".
 *
 * @property int $id_pat
 * @property string $nombre
 *
 * @property Semana[] $semanas
 */
class Pat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pat' => 'Id Pat',
            'nombre' => 'Nombre',
        ];
    }


    /**
     * Gets query for [[Semanas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSemanas()
    {
        return $this->hasMany(Semana::class, ['pat_id_pat' => 'id_pat']);
    }
}
