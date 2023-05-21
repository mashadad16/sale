<?php

use yii\db\Migration;

/**
 * Class m230521_120719_statuses
 */
class m230521_120719_statuses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        //таблица заказов
        $this->createTable('{{%statuses}}', [
            'id' => $this->primaryKey(),
            //наименование статуса
            'name' => $this->string(100)->notNull(),
        ], $tableOptions);

        $this->insert('statuses', [
            'name' => 'Выполнен',
        ]);

        $this->insert('statuses', [
            'name' => 'В работе',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%statuses}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230521_120719_statuses cannot be reverted.\n";

        return false;
    }
    */
}
