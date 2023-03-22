<?
namespace app\models;

use yii\db\ActiveRecord;

class Recipe extends ActiveRecord
{
  public static function tableName(){
    return 'recipe';
  }
public function getCategory(){
  return $this->hasOne(Category::class,['categoryId'=>'categoryId']);
}

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

}