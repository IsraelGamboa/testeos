<?php

namespace app\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "canalizacion".
 *
 * @property int $idcanalizacion
 * @property int $estado
 * @property string $asunto
 * @property string $cuerpo
 * @property int $grupo_id_grupo
 * @property int $id_tutorado
 *
 * @property Grupo $grupoIdGrupo
 * @property Tutorado $tutorado
 */
class Canalizacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'canalizacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estado', 'asunto', 'cuerpo', 'grupo_id_grupo', 'id_tutorado'], 'required'],
            [['estado', 'grupo_id_grupo', 'id_tutorado'], 'integer'],
            [['asunto', 'cuerpo'], 'string'],
            [['id_tutorado'], 'unique'],
            [['grupo_id_grupo'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::class, 'targetAttribute' => ['grupo_id_grupo' => 'id_grupo']],
            [['id_tutorado'], 'exist', 'skipOnError' => true, 'targetClass' => Tutorado::class, 'targetAttribute' => ['id_tutorado' => 'idtutorado']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcanalizacion' => 'Idcanalizacion',
            'estado' => 'Estado',
            'asunto' => 'Asunto',
            'cuerpo' => 'Cuerpo',
            'grupo_id_grupo' => 'Grupo Id Grupo',
            'id_tutorado' => 'Id Tutorado',
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

    /**
     * Gets query for [[Tutorado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTutorado()
    {
        return $this->hasOne(Tutorado::class, ['idtutorado' => 'id_tutorado']);
    }

    public function getTutorados($id_grupo)
    {
        $list = Tutorado::find()->where(['grupo_id_grupo'=> $id_grupo])->all();
        
        return ArrayHelper::map($list,'idtutorado','nombre');
    }

    //Funcion para administrador agregar a form
    public function getEstado()
    {
        return ['0'=>'No canalizado',
                '1'=>'Canalizado'];
    }
}
