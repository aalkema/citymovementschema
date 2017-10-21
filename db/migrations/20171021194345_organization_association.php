<?php


use Phinx\Migration\AbstractMigration;

class OrganizationAssociation extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('organization_association', ['id' => false, 'primary_key' => ['OrganizationId', 'AssociationId']]);
        $table->addColumn('OrganizationId', 'integer')
              ->addColumn('AssociationId', 'integer')
              ->addForeignKey('OrganizationId', 'organization', ['constraint' => 'OrganizationId'])
              ->addForeignKey('AssociationId', 'association', ['constraint' => 'AssociationId'])
              ->save();
    }

    public function down()
    {
        $this->dropTable('organization_association');
    }
}