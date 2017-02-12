<?php

namespace app\models;

use yii\db\ActiveRecord;

class Collection extends ActiveRecord
{
    public static function tableName()
    {
        return 'collection';
    }
}