<?php


use Phinx\Migration\AbstractMigration;

class Organization extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('organization', ['id' => 'OrganizationId']);
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
        $this->dropTable('organization');
    }
}