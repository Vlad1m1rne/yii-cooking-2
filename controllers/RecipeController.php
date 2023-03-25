<?
namespace app\controllers;

use yii\rest\ActiveController;

class RecipeController extends ActiveController
{

public $modelClass = 'app\models\Recipe';

public $serializer = [
  'class' => 'yii\rest\Serializer',
  'collectionEnvelope' => 'items',
];

}