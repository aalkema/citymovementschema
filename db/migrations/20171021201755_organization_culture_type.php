<?php


use Phinx\Migration\AbstractMigration;

class OrganizationCultureType extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('organization_culture_type', ['id' => false, 'primary_key' => ['OrganizationId', 'CultureTypeId']]);
        $table->addColumn('OrganizationId', 'integer')
              ->addColumn('CultureTypeId', 'integer')
              ->addForeignKey('OrganizationId', 'organization', ['constraint' => 'OrganizationId'])
              ->addForeignKey('CultureTypeId', 'culture_type', ['constraint' => 'CultureTypeId'])
              ->save();
    }

    public function down()
    {
        $this->dropTable('organization_culture_type');
    }
}