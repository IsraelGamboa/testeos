<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ParcialGeneral;

/**
 * SearchParcialGeneral represents the model behind the search form of `app\models\ParcialGeneral`.
 */
class SearchParcialGeneral extends ParcialGeneral
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_parcial_general', 'total_horas_ind', 'total_horas_grup', 'tutor_id_tutor', 'semana_real_idsemana_real'], 'integer'],
            [['nombre', 'fecha_entrega'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ParcialGeneral::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_parcial_general' => $this->id_parcial_general,
            'total_horas_ind' => $this->total_horas_ind,
            'total_horas_grup' => $this->total_horas_grup,
            'fecha_entrega' => $this->fecha_entrega,
            'tutor_id_tutor' => $this->tutor_id_tutor,
            'semana_real_idsemana_real' => $this->semana_real_idsemana_real,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
