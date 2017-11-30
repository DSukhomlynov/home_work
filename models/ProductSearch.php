<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form about `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent', 'active', 'delete', 'hit', 'sale', 'only_components_kit', 'is_packing', 'update'], 'integer'],
            [['name', 'alias', 'meta_title', 'meta_description', 'meta_keywords', 'taste', 'complect', 'content', 'ingredients', 'shipping_returns', 'advice'], 'safe'],
            [['price', 'old_price'], 'number'],
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
        $query = Product::find();

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
            'parent' => $this->parent,
            'active' => $this->active,
            'delete' => $this->delete,
            'price' => $this->price,
            'old_price' => $this->old_price,
            'hit' => $this->hit,
            'sale' => $this->sale,
            'only_components_kit' => $this->only_components_kit,
            'is_packing' => $this->is_packing,
            'update' => $this->update,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'meta_keywords', $this->meta_keywords])
            ->andFilterWhere(['like', 'taste', $this->taste])
            ->andFilterWhere(['like', 'complect', $this->complect])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'ingredients', $this->ingredients])
            ->andFilterWhere(['like', 'shipping_returns', $this->shipping_returns])
            ->andFilterWhere(['like', 'advice', $this->advice]);

        return $dataProvider;
    }
}
