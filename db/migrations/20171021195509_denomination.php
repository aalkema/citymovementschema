<?php


use Phinx\Migration\AbstractMigration;

class Denomination extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('denomination', ['id' => 'DenominationId']);
        $table->addColumn('DenominationName', 'string', ['limit' => 100])
              ->addColumn('DenominationCRALegalName', 'string', ['limit' => 100, 'null' => true, 'default' => null])
              ->save();
    }

    public function down()
    {
        $this->dropTable('denomination');
    }
}