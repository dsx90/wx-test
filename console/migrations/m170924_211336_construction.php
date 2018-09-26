<?php

use yii\db\Migration;

class m170924_211336_construction extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%construction}}', [
            'launch_id' => $this->integer()->unique()->notNull(),
            'content' => $this->text(),
            'price' => $this->integer(),
        ], $tableOptions);

        $this->addForeignKey(
          'fk-construction-launch_id',
          '{{%construction}}',
          'launch_id',
          '{{%launch}}',
          'id',
          'CASCADE',
          'RESTRICT'
        );

        $this->insert('{{%module}}', [
            'title'         => 'Construction',
            'name'          => 'Construction',
            'icon'          => 'fa fa-phone',
            'status'        => '1',
            'model'         => 'common\modules\construction\models\Construction',
            'controller'    => 'common\modules\construction\controllers\admin\ConstructionController',
            'form'          => '@common/modules/construction/views/admin/construction/cform',
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%construction}}');

        $this->delete('{{%module}}', [
            'title' => 'Construction',
        ]);
    }
}
