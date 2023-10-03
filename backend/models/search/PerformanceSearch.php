<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Performance;

/**
 * PerformanceSearch represents the model behind the search form of `app\models\Performance`.
 */
class PerformanceSearch extends Performance
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iddesempeño', 'excelente', 'bueno', 'riesgo', 'grupo_id_grupo'], 'integer'],
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
        $query = Performance::find();

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
            'iddesempeño' => $this->iddesempeño,
            'excelente' => $this->excelente,
            'bueno' => $this->bueno,
            'riesgo' => $this->riesgo,
            'grupo_id_grupo' => $this->grupo_id_grupo,
        ]);

        return $dataProvider;
    }
}
