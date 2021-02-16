<?php


namespace app\controllers;


use app\models\api\Book;

class BooksController extends BaseApiController
{
    public $modelClass = 'app\models\api\Book';

    public function actionIndex()
    {
        $query = Book::find();

        if (\Yii::$app->request->get('authorId'))
            $query->andWhere(['author_id' => \Yii::$app->request->get('authorId')]);

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => $this->params,
        ]);

        return $dataProvider;
    }
}