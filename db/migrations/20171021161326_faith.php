<?php


use Phinx\Migration\AbstractMigration;

class Faith extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('faith', ['id' => 'FaithId']);
        $table->addColumn('FaithName', 'string', ['limit' => 100])
              ->save();
    }   

    public function down()
    {
        $this->dropTable('Faith');
    }
}
