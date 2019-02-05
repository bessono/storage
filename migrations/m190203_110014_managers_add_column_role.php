<?php

use yii\db\Migration;

/**
 * Class m190203_110014_managers_add_column_role
 */
class m190203_110014_managers_add_column_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("managers", "role", $this->char(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190203_110014_managers_add_column_role cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190203_110014_managers_add_column_role cannot be reverted.\n";

        return false;
    }
    */
}
