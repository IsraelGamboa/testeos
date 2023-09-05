<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Semana;

/**
 * SearchSemana represents the model behind the search form of `app\models\Semana`.
 */
class SearchSemana extends Semana
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_semana', 'semana', 'pat_id_pat'], 'integer'],
            [['tipo_tutoria', 'tematica', 'objetivos', 'justificacion', 'estrategias_tutor', 'acciones', 'estrategias_tutorado'], 'safe'],
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
        $query = Semana::find();

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
            'id_semana' => $this->id_semana,
            'semana' => $this->semana,
            'pat_id_pat' => $this->pat_id_pat,
        ]);

        $query->andFilterWhere(['like', 'tipo_tutoria', $this->tipo_tutoria])
            ->andFilterWhere(['like', 'tematica', $this->tematica])
            ->andFilterWhere(['like', 'objetivos', $this->objetivos])
            ->andFilterWhere(['like', 'justificacion', $this->justificacion])
            ->andFilterWhere(['like', 'estrategias_tutor', $this->estrategias_tutor])
            ->andFilterWhere(['like', 'acciones', $this->acciones])
            ->andFilterWhere(['like', 'estrategias_tutorado', $this->estrategias_tutorado]);

        return $dataProvider;
    }
}
