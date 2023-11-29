<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Canalizacion;

/**
 * CanalizacionSearch represents the model behind the search form of `app\models\Canalizacion`.
 */
class CanalizacionSearch extends Canalizacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idcanalizacion', 'estado', 'grupo_id_grupo', 'id_tutorado'], 'integer'],
            [['asunto', 'cuerpo'], 'safe'],
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
        $query = Canalizacion::find();

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
            'idcanalizacion' => $this->idcanalizacion,
            'estado' => $this->estado,
            'grupo_id_grupo' => $this->grupo_id_grupo,
            'id_tutorado' => $this->id_tutorado,
        ]);

        $query->andFilterWhere(['like', 'asunto', $this->asunto])
            ->andFilterWhere(['like', 'cuerpo', $this->cuerpo]);

        return $dataProvider;
    }
}
