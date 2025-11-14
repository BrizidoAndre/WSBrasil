<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Realty;

/**
 * RealtySearch represents the model behind the search form of `app\models\Realty`.
 */
class RealtySearch extends Realty
{
    public $rent;
    public $buy;
    public $min_size;
    public $max_size;
    public $min_value;
    public $max_value;
    public $direction;
    public $order;
    public $categories;
    public $cities;
    public $neighborhoods;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'offer_type', 'rooms_qt', 'toilet_qt', 'suite_qt', 'parkingspace_qt', 'stateId', 'cityId', 'neighborhoodId', 'realtyTypeId'], 'integer'],
            [['address', 'comments', 'image_path', 'rent', 'buy', 'direction', 'order', 'categories', 'cities','neighborhoods'], 'safe'],
            [['value', 'size'], 'number'],
            [['min_size', 'max_size', 'min_value', 'max_value'], 'number'],
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Realty::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'offer_type' => $this->offer_type,
            'rooms_qt' => $this->rooms_qt,
            'toilet_qt' => $this->toilet_qt,
            'suite_qt' => $this->suite_qt,
            'parkingspace_qt' => $this->parkingspace_qt,
            'value' => $this->value,
            'size' => $this->size,
            'stateId' => $this->stateId,
            'cityId' => $this->cityId,
            'neighborhoodId' => $this->neighborhoodId,
            'realtyTypeId' => $this->realtyTypeId,
        ]);
        if (!empty($this->buy) && !empty($this->rent)) {
//            no filter applied
        } else if (!empty($this->buy)) {
            $query->andFilterWhere(['offer_type' => 0]);
        } else if (!empty($this->rent)) {
            $query->andFilterWhere(['offer_type' => 1]);
        }

        $query->orderBy("$this->order $this->direction");

        $query->andFilterWhere(['>', 'size', $this->min_size]);
        $query->andFilterWhere(['<', 'size', $this->max_size]);
        $query->andFilterWhere(['>', 'value', $this->min_value]);
        $query->andFilterWhere(['<', 'value', $this->max_value]);

        if(!empty($this->categories)){
            $query->andFilterWhere(['realtyTypeId' => $this->categories]);
        }
        if(!empty($this->cities)){
            $query->andFilterWhere(['cityId' => $this->cities]);
        }
        if(!empty($this->neighborhoods)){
            $query->andFilterWhere(['neighborhoodId' => $this->neighborhoods]);
        }

        $query->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'comments', $this->comments]);


        return $dataProvider;
    }
}
