<?php

use yii\db\Migration;

/**
 * Handles the creation for table `teacher_subject_table`.
 */
class m161105_095056_create_teacher_subject_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('teacher_subject', [
            'teacher_id' => $this->integer(),
            'subject_id' => $this->integer(),
        ]);
    
        $this->addForeignKey('fk-teacher_subject-teacher_id',
            'teacher_subject',
            'teacher_id',
            'teachers',
            'id',
            'CASCADE'
        );
        
        $this->addForeignKey('fk-teacher_subject-subject_id',
            'teacher_subject',
            'subject_id',
            'subjects',
            'id',
            'CASCADE'
        );
    }

    


    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('teacher_subject_table');
    }
}
