<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Liberacion;

/**
 * LiberacionSearch represents the model behind the search form of `app\models\Liberacion`.
 */
class LiberacionSearch extends Liberacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idevaluacion', 'tutorado_idtutorado'], 'integer'],
            [['op1', 'op2', 'op3', 'op4', 'op5', 'op6', 'op7'], 'safe'],
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
        $query = Liberacion::find();

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
            'idevaluacion' => $this->idevaluacion,
            'tutorado_idtutorado' => $this->tutorado_idtutorado,
        ]);

        $query->andFilterWhere(['like', 'op1', $this->op1])
            ->andFilterWhere(['like', 'op2', $this->op2])
            ->andFilterWhere(['like', 'op3', $this->op3])
            ->andFilterWhere(['like', 'op4', $this->op4])
            ->andFilterWhere(['like', 'op5', $this->op5])
            ->andFilterWhere(['like', 'op6', $this->op6])
            ->andFilterWhere(['like', 'op7', $this->op7]);

        return $dataProvider;
    }
}
