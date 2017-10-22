<?php

use Phinx\Migration\AbstractMigration;

class RemoveFinanceFk extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('organization');
        $table->dropForeignKey('FinancialSizeId');
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('organization');
        $table->AddForeignKey('FinancialSizeId', 'financial_size', ['constraint' => 'FinancialSizeId'])
              ->update();
    }
}