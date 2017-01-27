<?php

use yii\db\Migration;

/**
 * Handles the creation of table `card`.
 */
class m170127_000030_create_card_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->execute(file_get_contents(__DIR__ . '/init_card_create.sql'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('card');
    }
}
