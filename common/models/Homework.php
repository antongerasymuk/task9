<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "homeworks".
 *
 * @property integer $id
 * @property string $name
 * @property integer $mark
 */
class Homework extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'homeworks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['name'], 'string', 'max' => 25],
            [['subject_id'], 'integer'],
        ];
    }


    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
  
            'subject_id' => 'Department ID',
        ];
    }
}
