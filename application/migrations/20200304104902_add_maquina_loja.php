<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_maquina_loja extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id_mlg' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'fk_id_maquina' => array(
                                'type' => 'INT',
                                'constraint' => '11',
                                'null' => TRUE
                        ),
                        'fk_id_loja' => array(
                                'type' => 'INT',
                                'constraint' => '11',
                                'null' => TRUE
                        ),
                        'created_data' => array(
                                'type' => 'timestamp'
                        ),
                ));
                $this->dbforge->add_key('id_mlg', TRUE);
                $this->dbforge->create_table('loja_com_maquinas');
        }

        public function down()
        {
                $this->dbforge->drop_table('loja_com_maquinas');
        }
}