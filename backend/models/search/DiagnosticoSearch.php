<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Diagnostico;

/**
 * DiagnosticoSearch represents the model behind the search form of `app\models\Diagnostico`.
 */
class DiagnosticoSearch extends Diagnostico
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_diagnostico', 'matricula', 'motivo_id_motivo', 'grupo_id_grupo'], 'integer'],
            [['nombre','asignatura', 'otro', 'especifique'], 'safe'],
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
            'matricula' => $this->matricula,
            'motivo_id_motivo' => $this->motivo_id_motivo,
            'grupo_id_grupo' => $this->grupo_id_grupo,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'asignatura', $this->asignatura])
            ->andFilterWhere(['like', 'otro', $this->otro])
            ->andFilterWhere(['like', 'especifique', $this->especifique]);

        return $dataProvider;
    }
}
