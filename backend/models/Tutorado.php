<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tutorado".
 *
 * @property int $idtutorado
 * @property int $matricula
 * @property string $nombre
 * @property int $grupo_id_grupo
 *
 * @property Evaluacion[] $evaluacions
 * @property Grupo $grupoIdGrupo
 * @property Liberacion[] $liberacions
 */
class Tutorado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tutorado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['matricula', 'nombre', 'grupo_id_grupo'], 'required'],
            [['matricula', 'grupo_id_grupo'], 'integer'],
            [['nombre'], 'string', 'max' => 60],
            [['grupo_id_grupo'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::class, 'targetAttribute' => ['grupo_id_grupo' => 'id_grupo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtutorado' => 'Idtutorado',
            'matricula' => 'Matricula',
            'nombre' => 'Nombre',
            'grupo_id_grupo' => 'Grupo Id Grupo',
        ];
    }

    /**
     * Gets query for [[Evaluacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluacions()
    {
        return $this->hasMany(Evaluacion::class, ['tutorado_idtutorado' => 'idtutorado']);
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
     * Gets query for [[Liberacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLiberacions()
    {
        return $this->hasMany(Liberacion::class, ['tutorado_idtutorado' => 'idtutorado']);
    }
}
