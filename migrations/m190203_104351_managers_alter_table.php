<?php

use yii\db\Migration;

/**
 * Class m190203_104351_managers_alter_table
 */
class m190203_104351_managers_alter_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn("managers", "role");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190203_104351_managers_alter_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190203_104351_managers_alter_table cannot be reverted.\n";

        return false;
    }
    */
}
