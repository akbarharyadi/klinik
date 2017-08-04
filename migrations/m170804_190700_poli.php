<?php

use yii\db\Migration;

/**
 * Class m170804_190700_poli
 */
class m170804_190700_poli extends Migration
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

		$this->createTable('poli', [
			'id'      => 'pk',
			'kode_poli' => 'string',

			'nama'    => 'string',

			'created_at' => 'int',
			'updated_at' => 'int',
		], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('poli');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170804_190700_poli cannot be reverted.\n";

        return false;
    }
    */
}
