<?php

use yii\db\Migration;

/**
 * Class m171013_031832_tebus
 */
class m171013_031832_tebus extends Migration
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

		$this->createTable('tebus', [
			'id'      => 'pk',
			'pasien_id' => 'int',

			'obat'    => 'text',
			'harga'    => 'float',

			'created_at' => 'int',
			'updated_at' => 'int',
		], $tableOptions);


		$this->addForeignKey('fk_obat_pasien_id', 'tebus', 'pasien_id', 'pasien', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('tebus');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171013_031832_tebus cannot be reverted.\n";

        return false;
    }
    */
}
