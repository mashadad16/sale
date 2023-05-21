<?php

use yii\db\Migration;

/**
 * Class m230521_130407_orders
 */
class m230521_130407_orders extends Migration
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
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            //дата создания заказа
            'create_at' => $this->date()->notNull(),
            //наименование заказа
            'name' => $this->string(100)->notNull(),
            //id статуса из таблицы статусов
            'status_id' => $this->integer()->notNull(),
        ], $tableOptions);

        // Добавляем foreign key
        $this->addForeignKey(
            'status_id',  //"условное имя" ключа
            'orders', //название текущей таблицы
            'status_id', //имя поля в текущей таблице, которое будет ключом
            'statuses', //имя таблицы, с которой хотим связаться
            'id', //поле таблицы, с которым хотим связаться
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%orders}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230521_130407_orders cannot be reverted.\n";

        return false;
    }
    */
}


