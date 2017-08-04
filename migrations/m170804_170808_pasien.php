<?php

use yii\db\Migration;

/**
 * Class m170804_170808_pasien
 */
class m170804_170808_pasien extends Migration
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

		$this->createTable('pasien', [
			'id'      => 'pk',
			'no_pasien' => 'string',

			'nama'    => 'string',
            'tempat_lahir'    => 'string',
			'tanggal_lahir'    => 'date',
            'jenis_kelamin' => 'int',
            'nomor_telp' => 'string',

			'created_at' => 'int',
			'updated_at' => 'int',
		], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
		$this->dropTable('pasien');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170804_170808_pasien cannot be reverted.\n";

        return false;
    }
    */
}
