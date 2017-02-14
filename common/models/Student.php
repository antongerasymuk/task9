<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property integer $id
 * @property string $name
 * @property string $surmane
 * @property string $email
 * @property string $telephone
 * @property integer $department_id
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department_id'], 'integer'],
            [['name', 'surname'], 'string', 'max' => 25],
            [['email'], 'string', 'max' => 20],
            [['telephone'], 'string', 'max' => 10],
        ];
    }

    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surmane' => 'Surmane',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'department_id' => 'Department ID',
        ];
    }
}
