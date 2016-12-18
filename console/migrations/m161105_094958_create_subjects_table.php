<?php

use yii\db\Migration;

/**
 * Handles the creation for table `subjects_table`.
 */
class m161105_094958_create_subjects_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('subjects', [
            'id' => $this->primaryKey(),
            'name' => $this->string(25),
            'department_id' => $this->integer(),
        ]);
   
        $this->addForeignKey('fk-subject-department_id',
            'subjects',
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
        $this->dropTable('subjects_table');
    }
}
