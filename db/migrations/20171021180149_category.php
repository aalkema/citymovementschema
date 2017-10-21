<?php


use Phinx\Migration\AbstractMigration;

class Category extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('category', ['id' => false, 'primary_key' => ['CRACategoryId']]);
        $table->addColumn('CRACategoryId', 'integer')
              ->addColumn('CategoryName', 'string', ['limit' => 100])
              ->save();
    }   

    public function down()
    {
        $this->dropTable('category');
    }
}
