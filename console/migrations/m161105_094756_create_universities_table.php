<?php

use yii\db\Migration;

/**
 * Handles the creation for table `universities`.
 */
class m161105_094756_create_universities_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('universities', [
            'id' => $this->primaryKey(),
            'name' => $this->string(25),
            'city' => $this->string(20),
            'site' => $this->string(20),
         
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('universities');
    }
}
