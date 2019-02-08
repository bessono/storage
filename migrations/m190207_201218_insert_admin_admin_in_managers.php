<?php

use yii\db\Migration;

/**
 * Class m190207_201218_insert_admin_admin_in_managers
 */
class m190207_201218_insert_admin_admin_in_managers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert("managers",['name'=>'Administrator',
            'login'=>'admin','password'=>md5('admin'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190207_201218_insert_admin_admin_in_managers cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190207_201218_insert_admin_admin_in_managers cannot be reverted.\n";

        return false;
    }
    */
}
