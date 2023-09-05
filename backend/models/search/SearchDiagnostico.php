<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Diagnostico;

/**
 * SearchDiagnostico represents the model behind the search form of `app\models\Diagnostico`.
 */
class SearchDiagnostico extends Diagnostico
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_diagnostico', 'motivo_id_motivo'], 'integer'],
            [['asignatura', 'otro', 'especifique'], 'safe'],
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
        $query = Diagnostico::find();

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
            'id_diagnostico' => $this->id_diagnostico,
            'motivo_id_motivo' => $this->motivo_id_motivo,
        ]);

        $query->andFilterWhere(['like', 'asignatura', $this->asignatura])
            ->andFilterWhere(['like', 'otro', $this->otro])
            ->andFilterWhere(['like', 'especifique', $this->especifique]);

        return $dataProvider;
    }
}
