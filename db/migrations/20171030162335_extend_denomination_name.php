<?php


use Phinx\Migration\AbstractMigration;

class ExtendDenominationName extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('denomination');
        $table->changeColumn('DenominationName', 'string', ['limit' => 255])
            ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('denomination');
        $table->changeColumn('DenominationName', 'string', ['limit' => 100])
            ->save();
    }
}
