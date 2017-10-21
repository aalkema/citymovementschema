<?php


use Phinx\Migration\AbstractMigration;

class OrganizationAgeRange extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('organization_age_range', ['id' => false, 'primary_key' => ['AgeRangeId', 'OrganizationId']]);
        $table->addColumn('AgeRangeId', 'integer')
              ->addColumn('OrganizationId', 'integer')
              ->addForeignKey('OrganizationId', 'organization', ['constraint' => 'OrganizationId'])
              ->addForeignKey('AgeRangeId', 'age_range', ['constraint' => 'AgeRangeId'])
              ->save();
    }

    public function down()
    {
        $this->dropTable('organization_age_range');
    }
}