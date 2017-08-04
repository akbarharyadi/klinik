<?php

use yii\db\Migration;

/**
 * Class m170804_163912_profile
 */
class m170804_163912_profile extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
		if ( $this->db->driverName === 'mysql' )
		{
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}

		$this->createTable('user_profile', [
			'id'      => 'pk',
			'user_id' => 'int',

			'name'    => 'string',
			'info'    => 'text',

			'created_at' => 'int',
			'updated_at' => 'int',
		], $tableOptions);


		$this->addForeignKey('fk_user_profile_user_id', 'user_profile', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_user_profile_user_id', 'user_profile');

		$this->dropTable('user_profile');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170804_163912_profile cannot be reverted.\n";

        return false;
    }
    */
}
