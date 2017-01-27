<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contract`.
 */
class m170127_000020_create_contract_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->execute(file_get_contents(__DIR__ . '/init_contract_create.sql'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('contract');
    }
}
