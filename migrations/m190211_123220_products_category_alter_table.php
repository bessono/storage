<?php

use yii\db\Migration;

/**
 * Class m190211_123220_products_category_alter_table
 */
class m190211_123220_products_category_alter_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn("products_category","special_group");
         $this->addColumn("products_category","special_group","ENUM('y','n')");
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190211_123220_products_category_alter_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190211_123220_products_category_alter_table cannot be reverted.\n";

        return false;
    }
    */
}
