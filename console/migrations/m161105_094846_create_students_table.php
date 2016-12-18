<?php

use yii\db\Migration;

/**
 * Handles the creation for table `students_table`.
 */
class m161105_094846_create_students_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('students', [
            'id' => $this->primaryKey(),
            'name' => $this->string(25),
            'surname' => $this->string(25),
            'email' => $this->string(20),
            'telephone' => $this->string(10),
            'department_id' => $this->integer(),           
        ]);

        $this->addForeignKey('fk-student-department_id',
            'students',
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
        $this->dropTable('students_table');
    }
}
