<?
namespace app\rest\models;

use app\models\Recipe as ModelsRecipe;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

class Recipe extends ModelsRecipe implements Linkable 
{

  public function fields(){
   $fields = parent::fields();
   unset($fields['link']);
   return $fields;
   }
public function getLinks(){
  return [
            Link::REL_SELF => Url::to(['recipe/view', 'id' => $this->recipeId], true),
        ];
}

}