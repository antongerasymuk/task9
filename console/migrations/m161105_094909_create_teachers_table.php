<?php

use yii\db\Migration;

/**
 * Handles the creation for table `teachers`.
 */
class m161105_094909_create_teachers_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('teachers', [
            'id' => $this->primaryKey(),
            'name' => $this->string(25),
            'surname' => $this->string(25),
            'department_id' => $this->integer(),
        ]);
        
        $this->addForeignKey('fk-teacher-department_id',
            'teachers',
            'department_id',
            'departments',
            'id',
            'CASCADE'
        );

    }




    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('teachers');
    }
}
