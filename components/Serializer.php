<?php

namespace app\components;

use yii\data\ActiveDataProvider;

class Serializer extends \yii\rest\Serializer
{
    protected function serializeDataProvider($dataProvider)
    {
        $output = parent::serializeDataProvider($dataProvider);

        if (!is_array($output)) return $output;

        return [
            'items' => $output,
            'limit' => $dataProvider->pagination->limit,
            'offset' => $dataProvider->pagination->offset,
            'rows' => $dataProvider->count
        ] ;
    }
}