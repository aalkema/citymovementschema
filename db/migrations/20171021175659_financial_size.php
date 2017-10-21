<?php


use Phinx\Migration\AbstractMigration;

class FinancialSize extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('financial_size', ['id' => 'FinancialSizeId']);
        $table->addColumn('FinancialSize', 'string', ['limit' => 100])
              ->save();
    }

    public function down()
    {
        $this->dropTable('financial_size');
    }
}
