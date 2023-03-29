<?php

namespace app\modules\api\controllers;


use yii\rest\ActiveController;


class RecipeController extends ActiveController
{

public $modelClass = 'app\rest\models\Recipe';

public $serializer = [ 
  'class' => 'yii\rest\Serializer',
  'collectionEnvelope' => 'items',
];

public function checkAccess($action, $model = null, $params = []){
  return true;
}

public function actions(){
  $actions = parent::actions();
  unset($actions['delete']);
  return $actions;
}

}
