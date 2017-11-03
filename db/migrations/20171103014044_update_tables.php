<?php


use Phinx\Migration\AbstractMigration;

class UpdateTables extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('organization_scraped', ['id' => 'OrganizationId']);
        $table->addColumn('BusinessId', 'string', ['limit' => 50])
              ->addColumn('BusinessNumber', 'string', ['limit' => 50])
              ->addColumn('BusinessSubNumber', 'string', ['limit' => 50])
              ->addColumn('CRACategoryID', 'integer')
              ->addColumn('FinancialSizeId', 'integer', ['null' => true])
              ->addColumn('CRALegalName', 'string', ['limit' => 100])
              ->addColumn('CRAAccountName', 'string', ['limit' => 100, 'null' => true, 'default' => null])
              ->addColumn('PreferredName', 'string', ['limit' => 100, 'null' => true, 'default' => null])
              ->addColumn('FaithId', 'integer', ['null' => true])
              ->addColumn('StatusId', 'integer', ['null' => true])
              ->addColumn('Notes', 'text', ['null' => true])
              ->addColumn('ParentOrganizationId', 'integer', ['null' => true])
              ->addColumn('RegisteredDate','datetime', ['null' => true])
              ->addColumn('Address','string', ['limit' => 1000, 'null' => true, 'default' => null])
              ->addColumn('City','string', ['limit' => 100, 'null' => true, 'default' => null])
              ->addColumn('Province','string', ['limit' => 100, 'null' => true, 'default' => null])
              ->addColumn('PostalCode','string', ['limit' => 10, 'null' => true, 'default' => null])
              ->addColumn('PhoneNumber','string', ['limit' => 20, 'null' => true, 'default' => null])
              ->addColumn('ImageUrl','string',['limit' => 256, 'null' => true, 'default' => null])
              // Foreign Keys below
              ->AddForeignKey('CRACategoryId', 'category', ['constraint' => 'CRACategoryId'])
              ->AddForeignKey('FinancialSizeId', 'financial_size', ['constraint' => 'FinancialSizeId'])
              ->AddForeignKey('FaithId', 'faith', ['constraint' => 'FaithId'])
              ->AddForeignKey('StatusId', 'status', ['constraint' => 'StatusId'])
              ->AddForeignKey('CRACategoryId', 'category', ['constraint' => 'CRACategoryId'])
              ->AddForeignKey('ParentOrganizationId', 'organization', ['contraint' => 'OrganizationId'])
              ->save();
    }

    public function down()
    {
        $this->dropTable('organization_scraped');
    }
}
