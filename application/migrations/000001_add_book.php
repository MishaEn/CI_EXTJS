<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Migration_Add_book extends CI_Migration {

    public function up()
    {
        /*book_id
book_name
author_name
book_year*/
        $this->dbforge->create_table('book');
        $this->dbforge->add_field(array(
            'book_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'book_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'author_name' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'book_year' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('book_id', TRUE);
        return 1;
    }

    public function down()
    {
        $this->dbforge->drop_table('blog');
    }
}