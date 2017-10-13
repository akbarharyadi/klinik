<?php

use yii\db\Migration;

/**
 * Class m171013_015046_periksa
 */
class m171013_015046_periksa extends Migration
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

		$this->createTable('periksa', [
			'id'      => 'pk',
			'pasien_id' => 'int',

			'keterangan'    => 'text',
			'resep'    => 'text',

			'created_at' => 'int',
			'updated_at' => 'int',
		], $tableOptions);


		$this->addForeignKey('fk_periksa_pasien_id', 'periksa', 'pasien_id', 'pasien', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('periksa');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171013_015046_periksa cannot be reverted.\n";

        return false;
    }
    */
}
