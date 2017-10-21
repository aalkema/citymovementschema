<?php


use Phinx\Migration\AbstractMigration;

class OrganizationFinance extends AbstractMigration
{

    public function up()
    {
        $table = $this->table('organization_finance', ['id' => false, 'primary_key' => ['OrganizationId', 'Year']]);
        $table->addColumn('OrganizationId', 'integer')
              ->addColumn('Year', 'integer')
              ->addColumn('TotalAssets', 'integer', ['default' => 0])
              ->addColumn('TotalLiabilities', 'integer', ['default' => 0])
              ->addColumn('TotalRevenue', 'integer', ['default' => 0])
              ->addColumn('TotalDonations', 'integer', ['default' => 0])
              ->addColumn('BuildingOwner', 'boolean', ['null' => true, 'default' => null])
              ->addForeignKey('OrganizationId', 'organization', ['constraint' => 'OrganizationId'])
              ->save();
    }

    public function down()
    {
        $this->dropTable('organization_finance');
    }
}