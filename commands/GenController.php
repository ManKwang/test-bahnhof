<?php


namespace app\commands;


use app\models\Author;
use app\models\Book;
use Faker\Factory;
use yii\console\Controller;
use yii\console\ExitCode;

class GenController extends Controller
{
    public function actionIndex()
    {
        for ($i = 0; $i < 10; $i++)
        {
            $faker = Factory::create();
            $author = new Author([
                'name' => $faker->name,
            ]);

            $author->save();

            for ($j = 0; $j < 5; $j++)
            {
                $faker_book = Factory::create();

                $book = new Book([
                    'title' => $faker_book->sentence(3),
                    'author_id' => $author->id,
                ]);

                $book->save();
            }
        }

        return ExitCode::OK;
    }
}