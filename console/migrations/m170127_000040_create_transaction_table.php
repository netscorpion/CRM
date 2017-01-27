<?php

use yii\db\Migration;

/**
 * Handles the creation of table `card`.
 */
class m170127_000040_create_transaction_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->execute(file_get_contents(__DIR__ . '/init_transaction_create.sql'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('transaction');
    }
}
