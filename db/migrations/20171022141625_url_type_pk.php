<?php


use Phinx\Migration\AbstractMigration;

class UrlTypePk extends AbstractMigration
{
    public function up()
    {
        $this->dropTable('organization_url');

        $table = $this->table('organization_url', ['id' => false, 'primary_key' => ['OrganizationId','URLTypeId']]);
        $table->addColumn('OrganizationId', 'integer')
              ->addColumn('URLTypeId', 'integer')
              ->addColumn('URL', 'string')
              ->addForeignKey('OrganizationId', 'organization', ['constraint' => 'OrganizationId'])
              ->addForeignKey('URLTypeId', 'url_type', ['constraint' => 'URLTypeId'])
              ->save();
    }

    public function down()
    {
        $this->dropTable('organization_url');

        $table = $this->table('organization_url', ['id' => false, 'primary_key' => ['OrganizationId']]);
        $table->addColumn('OrganizationId', 'integer')
              ->addColumn('URLTypeId', 'integer')
              ->addColumn('URL', 'string')
              ->addForeignKey('OrganizationId', 'organization', ['constraint' => 'OrganizationId'])
              ->addForeignKey('URLTypeId', 'url_type', ['constraint' => 'URLTypeId'])
              ->save();
    }
}