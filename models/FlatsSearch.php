<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Flats;

/**
 * FlatsSearch represents the model behind the search form of `app\models\Flats`.
 */
class FlatsSearch extends Flats
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['flat_id', 'wing_id'], 'integer'],
            [['flat_no'], 'safe'],
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
        $query = Flats::find();

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
            'flat_id' => $this->flat_id,
            'wing_id' => $this->wing_id,
        ]);

        $query->andFilterWhere(['like', 'flat_no', $this->flat_no]);

        return $dataProvider;
    }
}
