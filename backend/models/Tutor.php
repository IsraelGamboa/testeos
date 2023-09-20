<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tutor".
 *
 * @property int $id_tutor
 * @property string $nombre
 */
class Tutor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tutor';
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
            'id_tutor' => 'Id Tutor',
            'nombre' => 'Nombre',
        ];
    }
}
