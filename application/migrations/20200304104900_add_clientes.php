<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_clientes extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'cli_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'cli_fk_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'cli_fk_plano' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'cli_fk_parcelas' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'cli_vl_bruto' => array(
                            'type' => 'DECIMAL',
                            'constraint' => '10,2',
                            'null' => FALSE,
                            'default' => 0.00
                        ),
                        'cli_cartao' => array(
                            'type' => 'ENUM("Visa","Mastercard","Elo", "Sorocard", "Policard", "Valecard", "American Express", "Hipercard", "Diners Club", "Outros")',
                            'default' => 'Outros',
                            'null' => FALSE,
                        ),
                        'cli_fk_num_maquina' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                            'null' => FALSE
                        ),
                        'cli_key_transacao' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                            'null' => FALSE
                        ),
                        'cli_created_at' => array(
                            'type' => 'timestamp'
                        ),
                ));
                $this->dbforge->add_key('cli_id', TRUE);
                $this->dbforge->create_table('clientes_transacao');
        }

        public function down()
        {
                $this->dbforge->drop_table('clientes_transacao');
        }
}