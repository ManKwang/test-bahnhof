<?php

namespace app\models\api;

class Book extends \app\models\Book
{
    public function fields()
    {
        return ['id', 'title', 'author'];
    }
}