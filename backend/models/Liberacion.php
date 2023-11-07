<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "liberacion".
 *
 * @property int $idevaluacion
 * @property string $op1
 * @property string $op2
 * @property string $op3
 * @property string $op4
 * @property string $op5
 * @property string $op6
 * @property string $op7
 * @property int $tutorado_idtutorado
 *
 * @property Tutorado $tutoradoIdtutorado
 */
class Liberacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'liberacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['op1', 'op2', 'op3', 'op4', 'op5', 'op6', 'op7', 'tutorado_idtutorado'], 'required'],
            [['tutorado_idtutorado'], 'integer'],
            [['op1', 'op2', 'op3', 'op4', 'op5', 'op6', 'op7'], 'string', 'max' => 45],
            [['tutorado_idtutorado'], 'exist', 'skipOnError' => true, 'targetClass' => Tutorado::class, 'targetAttribute' => ['tutorado_idtutorado' => 'idtutorado']],
            ['tutorado_idtutorado', 'unique', 'targetAttribute' => ['tutorado_idtutorado'], 'message' => 'Los datos ya existen para este tutorado.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idevaluacion' => 'Idevaluacion',
            'op1' => 'Cal-1',
            'op2' => 'Cal-2',
            'op3' => 'Cal-3',
            'op4' => 'Cal-4',
            'op5' => 'Cal-5',
            'op6' => 'Cal-6',
            'op7' => 'Cal-7',
            'tutorado_idtutorado' => 'Tutorado Idtutorado',
        ];
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
