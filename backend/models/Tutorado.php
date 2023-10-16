<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tutorado".
 *
 * @property int $idtutorado
 * @property string $nombre
 * @property int $grupo_id_grupo
 *
 * @property Grupo $grupoIdGrupo
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
            [['nombre', 'grupo_id_grupo'], 'required'],
            [['grupo_id_grupo'], 'integer'],
            [['nombre'], 'string', 'max' => 60],
            [['idtutorado'], 'unique'],
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
            'nombre' => 'Nombre',
            'grupo_id_grupo' => 'Grupo Id Grupo',
        ];
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
}
