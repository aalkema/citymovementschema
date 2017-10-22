<?php

use Phinx\Migration\AbstractMigration;

class RemoveFinanceSize extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('organization');
        $table->dropForeignKey('FinancialSizeId');
        $table->removeColumn('FinancialSizeId')
            ->save();

        $this->dropTable('financial_size');
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('financial_size', ['id' => 'FinancialSizeId']);
        $table->addColumn('FinancialSize', 'string', ['limit' => 100])
              ->save();

        $table = $this->table('organization');
        $table->addColumn('FinancialSizeId', int, ['null' => true])
              ->AddForeignKey('FinancialSizeId', 'financial_size', ['constraint' => 'FinancialSizeId'])
              ->update();
    }
}