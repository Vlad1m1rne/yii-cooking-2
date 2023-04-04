<?php

namespace app\modules\api\controllers;


use yii\rest\ActiveController;
use Yii;
use yii\data\ActiveDataProvider;
use app\modules\api\models\Recipe;

class RecipeController extends ActiveController
{

public $modelClass = 'app\modules\api\models\Recipe';

public $serializer = [ 
  'class' => 'yii\rest\Serializer',
  'collectionEnvelope' => 'items',
];

public function checkAccess($action, $model = null, $params = []){
  if($action==='delete'){
    if(Yii::$app->user->identity['username'] !=='admin'){
      throw new \yii\web\ForbiddenHttpException(sprintf('Вы не можете пользоваться этим методом!', $action));
    }
  }
  // return true;
}

protected function verbs(){
  
    $verbs = parent::verbs();
    $verbs['index'][] = 'POST'; 
    return $verbs;
  
}
// public function actions(){
//   $actions = parent::actions();
//   // unset($actions['delete']);
//   return $actions;
// }

// public function actionIndex()
// {
//     return new ActiveDataProvider([
//         'query' => Recipe::find(),
//     ]);
// }

}
