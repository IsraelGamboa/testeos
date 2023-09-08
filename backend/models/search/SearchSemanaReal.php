<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SemanaReal;

/**
 * SearchSemanaReal represents the model behind the search form of `app\models\SemanaReal`.
 */
class SearchSemanaReal extends SemanaReal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idsemana_real', 'sesion_grupal', 'sesion_no_grupal', 'tutorados_atendidos', 'faltas', 'total_grupo', 'hombres', 'mujeres', 'total_tutorados', 'semana_id_semana'], 'integer'],
            [['evidencias', 'observaciones'], 'safe'],
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
    public function search($params, $semana_id_semana = null)
    {

        if($semana_id_semana){
            $query = SemanaReal::find()->where(['semana_id_semana' => $semana_id_semana]);
        }else{
            $query = SemanaReal::find();
        }


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
            'idsemana_real' => $this->idsemana_real,
            'sesion_grupal' => $this->sesion_grupal,
            'sesion_no_grupal' => $this->sesion_no_grupal,
            'tutorados_atendidos' => $this->tutorados_atendidos,
            'faltas' => $this->faltas,
            'total_grupo' => $this->total_grupo,
            'hombres' => $this->hombres,
            'mujeres' => $this->mujeres,
            'total_tutorados' => $this->total_tutorados,
            'semana_id_semana' => $this->semana_id_semana,
        ]);

        $query->andFilterWhere(['like', 'evidencias', $this->evidencias])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
