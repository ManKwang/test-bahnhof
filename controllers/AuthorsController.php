<?php


namespace app\controllers;


use app\models\api\Author;
use app\models\api\Book;
use yii\data\ActiveDataProvider;

class AuthorsController extends BaseApiController
{
    public $modelClass = Author::class;

    public function actions()
    {
        $actions =  parent::actions();

        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider()
    {
        $query = $this->modelClass::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => $this->params,
        ]);

        return $dataProvider;
    }
}