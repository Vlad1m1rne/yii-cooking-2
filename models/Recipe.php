<?

namespace app\models;

use yii\db\ActiveRecord;

class Recipe extends ActiveRecord
{
  public $photo;
  public static function tableName()
  {
    return 'recipe';
  }
  public function getCategory()
  {
    return $this->hasOne(Category::class, ['categoryId' => 'categoryId']);
  }

  public function rules()
  {
    return [
      [['categoryId', 'nameRecipe', 'ingredient', 'recipeDescription', 'dat'], 'required'],
      [['categoryId'], 'integer'],
      [['ingredient', 'recipeDescription', 'link'], 'string'],
      [['dat','photoName'], 'safe'],
      [['photo'], 'file', 'extensions' => 'png, jpg, jpeg'],
      [['nameRecipe'], 'string', 'max' => 150],
      [['categoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['categoryId' => 'categoryId']],
    ];
  }

  public function upload()
  {
    if ($this->validate()) {
      $this->photo->saveAs('uploads/ ' . $this->photo->baseName . '.' . $this->photo->extension);
      return true;
    } else return false;
  }
}
