<?php

use yii\db\Migration;

/**
 * Class m170804_193241_pegawai
 */
class m170804_193241_pegawai extends Migration
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

		$this->createTable('pegawai', [
			'id'      => 'pk',
			'kode' => 'string',

			'nama'    => 'string',
			'tempat_lahir'    => 'string',
			'tanggal_lahir'    => 'date',
			'jenis_kelamin'    => 'int',
            'alamat' => 'text',
            'no_telp' => 'string',
            'tipe' => 'int',
            'user_id' => 'int',
            'poli_id' => 'int',

			'created_at' => 'int',
			'updated_at' => 'int',
		], $tableOptions);


		$this->addForeignKey('fk_user_pegawai_id', 'pegawai', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');

		$this->addForeignKey('fk_poli_pegawai_id', 'pegawai', 'poli_id', 'poli', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_user_pegawai_id', 'pegawai');
        $this->dropForeignKey('fk_poli_pegawai_id', 'pegawai');

		$this->dropTable('pegawai');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170804_193241_pegawai cannot be reverted.\n";

        return false;
    }
    */
}
