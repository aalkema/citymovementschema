<?php


use Phinx\Migration\AbstractMigration;

class OrganizationDenominationScraped extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('organization_denomination_scraped', ['id' => false, 'primary_key' => ['OrganizationId', 'DenominationId']]);
        $table->addColumn('OrganizationId', 'integer')
              ->addColumn('DenominationId', 'integer')
              ->addForeignKey('DenominationId', 'denomination', ['constraint' => 'DenominationId'])
              ->addForeignKey('OrganizationId', 'organization', ['constraint' => 'OrganizationId'])
              ->save();
    }

    public function down()
    {
        $this->dropTable('organization_denomination_scraped');
    }
}
