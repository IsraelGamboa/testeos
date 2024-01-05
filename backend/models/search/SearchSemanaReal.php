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
            [['idsemana_real', 'orden_semana', 'tipo_sesion', 'sesion', 'tutorados_atendidos', 'faltas_tutorados', 'total_grupo', 'hombres', 'mujeres', 'total_tutorados', 'semana_id_semana', 'tutor_id_tutor', 'pat_id_pat'], 'integer'],
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
    public function search($params, $tutor_id_tutor = null)
    {

        if($tutor_id_tutor){
            $query = SemanaReal::find()->where(['tutor_id_tutor' => $tutor_id_tutor]);
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
            'orden_semana' => $this->orden_semana,
            'tipo_sesion' => $this->tipo_sesion,
            'sesion' => $this->sesion,
            'tutorados_atendidos' => $this->tutorados_atendidos,
            'faltas_tutorados' => $this->faltas_tutorados,
            'total_grupo' => $this->total_grupo,
            'hombres' => $this->hombres,
            'mujeres' => $this->mujeres,
            'total_tutorados' => $this->total_tutorados,
            'semana_id_semana' => $this->semana_id_semana,
            'tutor_id_tutor' => $this->tutor_id_tutor,
            'pat_id_pat' => $this->pat_id_pat,
        ]);

        $query->andFilterWhere(['like', 'evidencias', $this->evidencias])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
