<?php

namespace app\modules\api;

use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\auth\HttpBasicAuth;
use app\models\User;
use yii\filters\ContentNegotiator;

/**
 * api module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\api\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        \Yii::$app->user->enableSession = false;
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_HTML;

        $behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;

   
            $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::class,
            'auth' => function ($username, $password) {
                $user = User::find()->where(['username' => $username])->one();
                if ($user && $user->validatePassword($password)) {
                    return $user;
                }
                return null;
            },

        ];

        $behaviors['access'] = [
            'class' => AccessControl::class,
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'],
                ]
            ],
        ];

        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::class,
            'formatParam' => '_format',
                 'formats' => [
                'xml' => Response::FORMAT_XML,
                'json' => Response::FORMAT_JSON,
            ],
        ];

        // [
        //     'class' => 'yii\filters\ContentNegotiator',
        //     // 'only' => ['view', 'index'],  // in a controller
        //     // if in a module, use the following IDs for user actions
        //     // 'only' => ['user/view', 'user/index']

        //     'formatParam' => 'format',
        //     'formats' => [
        //         'xml' => Response::FORMAT_XML,
        //         'application/json' => Response::FORMAT_JSON,
        //     ],

        // ];

        return $behaviors;
    }
}
