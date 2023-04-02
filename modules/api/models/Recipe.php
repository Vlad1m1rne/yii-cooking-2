<?
namespace app\modules\api\models;

use app\models\Recipe as ModelsRecipe;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

class Recipe extends ModelsRecipe implements Linkable 
{

  public function fields(){
   $fields = parent::fields();
   unset($fields['link'],$fields['photo'],$fields['photoName']);
   return $fields;
   }
public function getLinks(){
  return [
            Link::REL_SELF => Url::to(['recipe/view', 'id' => $this->recipeId], true),
        ];
}

}