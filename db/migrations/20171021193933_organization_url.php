<?php


use Phinx\Migration\AbstractMigration;

class OrganizationUrl extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('organization_url', ['id' => false, 'primary_key' => ['OrganizationId']]);
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
    }
}