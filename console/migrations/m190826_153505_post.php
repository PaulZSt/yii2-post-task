<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190826_153505_post
 */
class m190826_153505_post extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }



        $this->createTable('{{%Post}}', [
            'id' => Schema::TYPE_PK,
            'Type' => Schema::TYPE_INTEGER,
            'CompanyName' => Schema::TYPE_STRING,
            'Position' => Schema::TYPE_STRING,
        ], $tableOptions);


        $this->createTable('{{%ContactPost}}', [
            'PostId' => Schema::TYPE_INTEGER,
            'ContactName' => Schema::TYPE_INTEGER,
            'ContactEmail' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->addForeignKey('fk-image-product_id-product_id', '{{%ContactPost}}', 'PostId', '{{%post}}', 'id', 'CASCADE');

        $this->createTable('{{%DescriptivePost}}', [
            'PostId' => Schema::TYPE_INTEGER,
            'PositionDescription' => Schema::TYPE_TEXT,
            'Salary' => Schema::TYPE_INTEGER,
            'StartAt' => Schema::TYPE_INTEGER,
            'EndAT' => Schema::TYPE_INTEGER,
        ], $tableOptions);
        $this->addForeignKey('fk-image-product_id-product_id', '{{%DescriptivePost}}', 'PostId', '{{%post}}', 'id', 'CASCADE');

        $this->createTable('{{%PostQueue}}', [
            'id' => Schema::TYPE_PK,
            'PostId' => Schema::TYPE_INTEGER,
            'PostAt' => Schema::TYPE_INTEGER,
            'NotificationQueueAt' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->addForeignKey('fk-image-product_id-product_id', '{{%PostQueue}}', 'PostId', '{{%post}}', 'id', 'CASCADE');

    }

    public function down()
    {
        $this->dropTable('{{%post}}');
        $this->dropTable('{{%ContactPost}}');
        $this->dropTable('{{%DescriptivePost}}');
        $this->dropTable('{{%PostQueue}}');
    }
}

