<?php

use yii\db\Migration;

/**
 * Class m171013_014604_add_status_to_pasien
 */
class m171013_014604_add_status_to_pasien extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('pasien', 'status', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('pasien', 'status');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171013_014604_add_status_to_pasien cannot be reverted.\n";

        return false;
    }
    */
}
