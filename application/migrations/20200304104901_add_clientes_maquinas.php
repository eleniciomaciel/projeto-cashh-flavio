<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_clientes_maquinas extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'maq_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'maq_numero' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '60',
                                'null' => TRUE
                        ),
                        'maq_data_aquisicao' => array(
                                'type' => 'DATE',
                                'null' => TRUE
                        ),
                        'maq_modelo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                        'maq_fornecedor' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                        'maq_telefone' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '16',
                                'null' => TRUE,
                        ),
                        'maq_email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '60',
                                'null' => TRUE
                        ),
                        'maq_garantias' => array(
                                'type' => 'ENUM("0","1")',
                                'default' => '0',
                                'null' => TRUE
                        ),
                        'maq_created_at' => array(
                                'type' => 'timestamp'
                        ),
                ));
                $this->dbforge->add_key('maq_id', TRUE);
                $this->dbforge->create_table('cad_maquininhas');
        }

        public function down()
        {
                $this->dbforge->drop_table('cad_maquininhas');
        }
}