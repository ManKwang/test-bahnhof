<?php


namespace app\controllers;


use app\components\Serializer;
use yii\rest\ActiveController;

class BaseApiController extends ActiveController
{
    public $params = [];

    public $serializer = [
        'class' => Serializer::class,
    ];

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => \yii\filters\ContentNegotiator::className(),
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (\Yii::$app->request->get('limit'))
            $this->params['pageSize'] = \Yii::$app->request->get('limit');

        if (\Yii::$app->request->get('offset'))
            $this->params['page'] = \Yii::$app->request->get('offset') - 1;

        return parent::beforeAction($action);
    }
}