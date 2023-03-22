<?

namespace app\components;

use yii\base\Widget;
use app\models\Recipe;
use yii\data\Pagination;

class TableWidget extends Widget
{

  public $cat;
  public $query;
  public $searchVal;
  public $searchField;

  public function init()
  {
    parent::init();
    if ($this->cat === null or $this->cat === 'all') {
      $this->cat = 'all';
    }

    if ($this->searchVal === '') {
      $this->searchVal = null;
    }
  }

  public function run()
  {
    if ($this->cat === 'all') {
      $this->query = Recipe::find()->with('category')->asArray();
    }
    if ($this->cat === 'first') {
      $this->query = Recipe::find()->where('categoryId = 1')->with('category')->asArray();
    }
    if ($this->cat === 'second') {
      $this->query = Recipe::find()->where('categoryId = 2')->with('category')->asArray();
    }
    if ($this->cat === 'salat') {
      $this->query = Recipe::find()->where('categoryId = 3')->with('category')->asArray();
    }
    if ($this->cat === 'cake') {
      $this->query = Recipe::find()->where('categoryId = 4')->with('category')->asArray();
    }
    if ($this->cat === 'other') {
      $this->query = Recipe::find()->where('categoryId = 5')->with('category')->asArray();
    }

    if ($this->cat === 'search') {
      if($this->searchField === 'nameRecipe'){
      $this->query = Recipe::find()->where(['like', 'nameRecipe', $this->searchVal])->with('category')->asArray();
      }
      elseif($this->searchField==='recipeDescription'){
        $this->query = Recipe::find()->where(['like', 'recipeDescription', $this->searchVal])->with('category')->asArray();
      }
      elseif($this->searchField ==='ingredient'){
        $this->query = Recipe::find()->where(['like','ingredient',$this->searchVal])->with('category')->asArray();
      }
    }

    $pages = new Pagination(['totalCount' => $this->query->count(), 'pageSize' => 5]);
    $models = $this->query->offset($pages->offset)->limit($pages->limit)->all();

    return $this->render('table', ['models' => $models, 'pages' => $pages, 'cat' => $this->cat]);
  }
}
