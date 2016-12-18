<?php
namespace common\helpers;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class ModelMapHelper
{
    public static function get($model, $fields, $key, $value)
    {
        /**
         * @var $model ActiveRecord
         */
        $model = new $model();
        $prosData = $model::find()
            ->select($fields)
            ->asArray()
            ->all();

        return ArrayHelper::map($prosData, $key, $value);
    }

    public static function getIdTitleMap($model, $fieldName = 'name')
    {
        return self::get($model, 'id, '.$fieldName, 'id', $fieldName);
    }
}