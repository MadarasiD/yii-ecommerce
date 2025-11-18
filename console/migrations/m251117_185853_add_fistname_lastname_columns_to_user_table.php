<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m251117_185853_add_fistname_lastname_columns_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'firstname', $this->string(255)->notNull()->after('id'));
        $this->addColumn('{{%user}}', 'lastname', $this->string(255)->notNull()->after('firstname'));
    }

    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'lastname');
        $this->dropColumn('{{%user}}', 'firstname');
    }
}
