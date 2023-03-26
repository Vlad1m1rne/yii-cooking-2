<?
namespace app\controllers;

use yii\filters\AccessControl;
use yii\rest\ActiveController;
use yii\web\Response;


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

public function behaviors()
{
    return [
      'access' => [
        'class'=>AccessControl::class,
        'rules'=>[
          ['allow' => true,
          'roles' => ['@'],]
        ],
      ],
        [
            'class' => 'yii\filters\ContentNegotiator',
            // 'only' => ['view', 'index'],  // in a controller
            // if in a module, use the following IDs for user actions
            // 'only' => ['user/view', 'user/index']

            'formatParam' => 'format',
            'formats' => [
              'xml' => Response::FORMAT_XML,
                'application/json' => Response::FORMAT_JSON,
            ],
           
        ],
    ];
}

}