<?php

use yii\db\Migration;

/**
 * Class m190208_121023_costs_create_table
 */
class m190208_121023_costs_create_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("costs",['id'=>$this->primaryKey(),
                                    'cost'=>$this->char(255),
                                    'description'=>$this->char(255),
                                    'can_change'=>"ENUM('y','n')"
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190208_121023_costs_create_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190208_121023_costs_create_table cannot be reverted.\n";

        return false;
    }
    */
}
