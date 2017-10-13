<?php

use yii\db\Migration;

/**
 * Class m171011_162719_tambah_column_di_tabel_pasien
 */
class m171011_162719_tambah_column_di_tabel_pasien extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('pasien', 'id_poli', $this->integer());
        $this->addColumn('pasien', 'id_doktor', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('pasien', 'id_poli');
        $this->dropColumn('pasien', 'id_doktor');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171011_162719_tambah_column_di_tabel_pasien cannot be reverted.\n";

        return false;
    }
    */
}
