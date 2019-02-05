<?php

use yii\db\Migration;

/**
 * Class m190202_093635_managers_table_create
 */
class m190202_093635_managers_table_create extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        return $this->createTable("managers",
                    ['id'=>$this->primaryKey(),
                     'login'=>$this->char(150),
                     'password'=>$this->char(150),
                     'name'=>$this->char(250),
                     'ban'=>"ENUM('y','n') default 'n'",
                     'role'=>$this->integer()->notNull(),
                     'auth_key'=>$this->char(150),
                     'access_token'=>$this->char(150)
                    ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return $this->dropTable("managers");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190202_093635_managers_table_create cannot be reverted.\n";

        return false;
    }
    */
}
