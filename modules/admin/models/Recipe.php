<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "recipe".
 *
 * @property int $recipeId
 * @property int $categoryId
 * @property string $nameRecipe
 * @property string $ingredient
 * @property string $recipeDescription
 * @property string|null $link
 * @property string $dat
 * @property string|null $photo
 *
 * @property Category $category
 */
class Recipe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoryId', 'nameRecipe', 'ingredient', 'recipeDescription', 'dat'], 'required'],
            [['categoryId'], 'integer'],
            [['ingredient', 'recipeDescription', 'link', 'photo'], 'string'],
            [['dat'], 'safe'],
            [['nameRecipe'], 'string', 'max' => 150],
            [['categoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['categoryId' => 'categoryId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'recipeId' => 'Recipe ID',
            'categoryId' => 'Category ID',
            'nameRecipe' => 'Name Recipe',
            'ingredient' => 'Ingredient',
            'recipeDescription' => 'Recipe Description',
            'link' => 'Link',
            'dat' => 'Dat',
            'photo' => 'Photo',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['categoryId' => 'categoryId']);
    }
}
