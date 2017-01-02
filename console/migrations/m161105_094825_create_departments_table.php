<?php

use yii\db\Migration;

/**
 * Handles the creation for table `departments`.
 */
class m161105_094825_create_departments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('departments', [
            'id' => $this->primaryKey(),
            'name' => $this->string(25),
            'university_id' => $this->integer(),
        ]);

        $this->addForeignKey('fk-post-university_id',
            'departments',
            'university_id',
            'universities',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('departments');
    }
}
