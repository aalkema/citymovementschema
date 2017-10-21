<?php


use Phinx\Migration\AbstractMigration;

class ProgramType extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('program_type', ['id' => 'ProgramTypeId']);
        $table->addColumn('ProgramTypeName', 'string', ['limit' => 100])
              ->save();
    }

    public function down()
    {
        $this->dropTable('program_type');
    }
}
