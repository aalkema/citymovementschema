<?php


use Phinx\Migration\AbstractMigration;

class OrganizationBnIndex extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('organization');
        $table->addIndex(['BusinessId'])
            ->save();
    }

    public function down()
    {
        $table = $this->table('organization');
        $table->removeIndex(['BusinessId']);
    }
}
