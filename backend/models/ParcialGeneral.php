<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parcial_general".
 *
 * @property int $id_parcial_general
 * @property string $nombre
 * @property int $total_horas_ind
 * @property int $total_horas_grup
 * @property string $fecha_entrega
 * @property int|null $tutor_id_tutor
 * @property int $semana_real_idsemana_real
 *
 * @property SemanaReal $semanaRealIdsemanaReal
 */
class ParcialGeneral extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parcial_general';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'total_horas_ind', 'total_horas_grup', 'fecha_entrega', 'semana_real_idsemana_real'], 'required'],
            [['total_horas_ind', 'total_horas_grup', 'tutor_id_tutor', 'semana_real_idsemana_real'], 'integer'],
            [['fecha_entrega'], 'safe'],
            [['nombre'], 'string', 'max' => 45],
            [['semana_real_idsemana_real'], 'exist', 'skipOnError' => true, 'targetClass' => SemanaReal::class, 'targetAttribute' => ['semana_real_idsemana_real' => 'idsemana_real']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_parcial_general' => 'Id Parcial General',
            'nombre' => 'Nombre',
            'total_horas_ind' => 'Total Horas Ind',
            'total_horas_grup' => 'Total Horas Grup',
            'fecha_entrega' => 'Fecha Entrega',
            'tutor_id_tutor' => 'Tutor Id Tutor',
            'semana_real_idsemana_real' => 'Semana Real Idsemana Real',
        ];
    }

    /**
     * Gets query for [[SemanaRealIdsemanaReal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSemanaRealIdsemanaReal()
    {
        return $this->hasOne(SemanaReal::class, ['idsemana_real' => 'semana_real_idsemana_real']);
    }
}
