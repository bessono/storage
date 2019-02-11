<?php

use yii\db\Migration;

/**
 * Class m190211_121221_products_category_create_table
 */
class m190211_121221_products_category_create_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            return $this->createTable("products_category",[
                                'id' => $this->primaryKey(),
                                'parent' => $this->integer(11),
                                'category_name' => $this->char(255),
                                'description' => $this->char(255),
                                'special_group' => $this->char(255)
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return $this->dropTable("products_category");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190211_121221_products_category_create_table cannot be reverted.\n";

        return false;
    }
    */
}
