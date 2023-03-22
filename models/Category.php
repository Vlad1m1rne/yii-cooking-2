<?
namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
  public static function tableName(){
    return 'category';
  }
public function getRecipe(){
  return $this->hasMany(Recipe::class,['categoryId'=>'categoryId']);
}

}