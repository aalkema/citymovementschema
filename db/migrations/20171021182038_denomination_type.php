<?php


use Phinx\Migration\AbstractMigration;

class DenominationType extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('denomination_type', ['id' => 'DenominationTypeId']);
        $table->addColumn('DenominationTypeName', 'string', ['limit' => 100])
              ->save();
    }

    public function down()
    {
        $this->dropTable('denomination_type');
    }
}