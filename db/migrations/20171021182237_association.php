<?php


use Phinx\Migration\AbstractMigration;

class Association extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('association', ['id' => 'AssociationId']);
        $table->addColumn('AssociationName', 'string', ['limit' => 100])
              ->save();
    }

    public function down()
    {
        $this->dropTable('association');
    }
}