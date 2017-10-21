<?php


use Phinx\Migration\AbstractMigration;

class AgeRange extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('age_range', ['id' => 'AgeRangeId']);
        $table->addColumn('AgeRangeName', 'string', ['limit' => 100])
              ->save();
    }

    public function down()
    {
        $this->dropTable('age_range');
    }
}