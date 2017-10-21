<?php


use Phinx\Migration\AbstractMigration;

class OrganizationProgramType extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('organization_program_type', ['id' => false, 'primary_key' => ['OrganizationId', 'ProgramTypeId']]);
        $table->addColumn('OrganizationId', 'integer')
              ->addColumn('ProgramTypeId', 'integer')
              ->addForeignKey('OrganizationId', 'organization', ['constraint' => 'OrganizationId'])
              ->addForeignKey('ProgramTypeId', 'program_type', ['constraint' => 'ProgramTypeId'])
              ->save();
    }

    public function down()
    {
        $this->dropTable('organization_program_type');
    }
}