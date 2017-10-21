<?php


use Phinx\Migration\AbstractMigration;

class Status extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('status', ['id' => 'StatusId']);
        $table->addColumn('StatusName', 'string', ['limit' => 100])
              ->save();
    }

    public function down()
    {
        $this->dropTable('status');
    }
}