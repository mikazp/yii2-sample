<?php

use yii\db\Migration;

class m171025_203739_createTblTodos extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('Todos', [
            'id' => $this->primaryKey(),
            'title' => $this->string(15),
            'text'  => $this->string(255),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('Todos');
    }
}
