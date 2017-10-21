<?php


use Phinx\Migration\AbstractMigration;

class CultureType extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('culture_type', ['id' => 'CultureTypeId']);
        $table->addColumn('CultureTypeName', 'string', ['limit' => 100])
              ->save();
    }

    public function down()
    {
        $this->dropTable('culture_type');
    }
}