<?php


use Phinx\Migration\AbstractMigration;

class UrlType extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('url_type', ['id' => 'URLTypeId']);
        $table->addColumn('URLypeName', 'string', ['limit' => 100])
              ->save();
    }

    public function down()
    {
        $this->dropTable('url_type');
    }
}