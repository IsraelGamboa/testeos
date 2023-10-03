<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "performance".
 *
 * @property int $iddesempeño
 * @property int $excelente
 * @property int $bueno
 * @property int $riesgo
 * @property int $grupo_id_grupo
 *
 * @property Grupo $grupoIdGrupo
 */
class Performance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'performance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['excelente', 'bueno', 'riesgo', 'grupo_id_grupo'], 'required'],
            [['excelente', 'bueno', 'riesgo', 'grupo_id_grupo'], 'integer'],
            [['grupo_id_grupo'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::class, 'targetAttribute' => ['grupo_id_grupo' => 'id_grupo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddesempeño' => 'Iddesempeño',
            'excelente' => 'Excelente desempeño',
            'bueno' => 'Buen desempeño',
            'riesgo' => 'Alumnos de alto riesgo',
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
