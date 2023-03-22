<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Recipe;

/**
 * RecipeSearch represents the model behind the search form of `app\modules\admin\models\Recipe`.
 */
class RecipeSearch extends Recipe
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recipeId', 'categoryId'], 'integer'],
            [['nameRecipe', 'ingredient', 'recipeDescription', 'link', 'dat', 'photo'], 'safe'],
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
        $query = Recipe::find();

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
            'recipeId' => $this->recipeId,
            'categoryId' => $this->categoryId,
            'dat' => $this->dat,
        ]);

        $query->andFilterWhere(['like', 'nameRecipe', $this->nameRecipe])
            ->andFilterWhere(['like', 'ingredient', $this->ingredient])
            ->andFilterWhere(['like', 'recipeDescription', $this->recipeDescription])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'photo', $this->photo]);

        return $dataProvider;
    }
}
