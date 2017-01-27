<?php

use yii\db\Migration;
use yii\db\Schema;

/***
 *
 *
***/
class m170127_000010_create_partner_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->execute(file_get_contents(__DIR__ . '/init_partner_create.sql'));
    }
    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('partner');
    }
}
