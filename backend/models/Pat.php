<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pat".
 *
 * @property int $id_pat
 * @property string $nombre
 * @property int $semestre_id_semestre
 *
 * @property Semana[] $semanas
 * @property Semestre $semestreIdSemestre
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
            [['semestre_id_semestre'], 'exist', 'skipOnError' => true, 'targetClass' => Semestre::class, 'targetAttribute' => ['semestre_id_semestre' => 'id_semestre']],
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
            'semestre_id_semestre' => 'Id Semestre'
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
    public function getSemestreIdSemestre()
    {
        return $this->hasMany(Semestre::class, ['id_semestre' => 'semestre_id_semestre']);
    }
}
