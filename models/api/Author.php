<?php

namespace app\models\api;

class Author extends \app\models\Author
{
    public function fields()
    {
        return ['id', 'name'];
    }
}