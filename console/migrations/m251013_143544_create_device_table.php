<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%device}}`.
 */
class m251013_143544_create_device_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%device}}', [
            'id' => $this->primaryKey(),
            'store_name' => $this->string()->null(),
            'created_at' => $this->timestamp()->notNull(),
        ]);

        $this->addForeignKey(
            '{{%fk-device-store-name}}',
            '{{%device}}',
            'store_name',
            '{{%store}}',
            'name',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%device}}');
    }
}
