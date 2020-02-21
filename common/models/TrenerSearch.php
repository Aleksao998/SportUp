<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Trener;

/**
 * TrenerSearch represents the model behind the search form of `common\models\Trener`.
 */
class TrenerSearch extends Trener
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'korisnik_id'], 'integer'],
            [['ime', 'prezime', 'slika', 'opis', 'pol'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Trener::find();

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
            'id' => $this->id,
            'korisnik_id' => $this->korisnik_id,
        ]);

        $query->andFilterWhere(['like', 'ime', $this->ime])
            ->andFilterWhere(['like', 'prezime', $this->prezime])
            ->andFilterWhere(['like', 'slika', $this->slika])
            ->andFilterWhere(['like', 'opis', $this->opis])
            ->andFilterWhere(['like', 'pol', $this->pol]);

        return $dataProvider;
    }
}
