<?php

use Phinx\Migration\AbstractMigration;

class UpdateUrlType extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('url_type');
        $table->renameColumn('URLypeName', 'URLTypeName');
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('url_type');
        $table->renameColumn('URLTypeName', 'URLypeName');
    }
}