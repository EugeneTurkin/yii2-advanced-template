<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%store}}`.
 */
class m251013_143205_create_store_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%store}}', [
            'name' => $this->string(255)->notNull()->append('PRIMARY KEY'),
            'created_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%store}}');
    }
}
