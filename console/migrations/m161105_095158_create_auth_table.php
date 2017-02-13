<?php

use yii\db\Migration;

/**
 * Handles the creation for table `auth`.
 */
class m161105_095157_create_auth_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('auth', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'source' => $this->string(255)->notNull(),
            'source_id' => $this->string(255)->notNull(),
        ]);
       
        $this->addForeignKey('fk-auth-user_id-user-id',
            'auth',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }
 
    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('auth');
    }
}
