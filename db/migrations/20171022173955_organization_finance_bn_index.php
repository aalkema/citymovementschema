<?php


use Phinx\Migration\AbstractMigration;

class OrganizationFinancebnIndex extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('organization_finance');
        $table->addIndex(['BN'])
            ->save();
    }

    public function down()
    {
        $table = $this->table('organization_finance');
        $table->removeIndex(['BN']);
    }
}