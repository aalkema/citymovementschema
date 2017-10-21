<?php


use Phinx\Migration\AbstractMigration;

class DenominationDenominationType extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('denomination_denomination_type', ['id' => false, 'primary_key' => ['DenominationId', 'DenominationTypeId']]);
        $table->addColumn('DenominationId', 'integer')
              ->addColumn('DenominationTypeId', 'integer')
              ->addForeignKey('DenominationId', 'denomination', ['constraint' => 'DenominationId'])
              ->addForeignKey('DenominationTypeId', 'denomination_type', ['constraint' => 'DenominationTypeId'])
              ->save();
    }

    public function down()
    {
        $this->dropTable('denomination_denomination_type');
    }
}