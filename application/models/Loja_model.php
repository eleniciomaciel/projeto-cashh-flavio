<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Loja_model extends CI_Model {

    public function add_loja_plus_icashh($id = FALSE)
    {
            if ($id === FALSE)
            {
                $id = '1';
                $data = array(
                    'fk_cadastrado_por_lj'          => $id,
                    'nome_fantasia_lj'              => strtoupper($this->input->post('inputFantazia', TRUE)) ,
                    'regiao_lj'                     => $this->input->post('country_loja', TRUE),
                    'estado_lj'                     => $this->input->post('stateLoja', TRUE),
                    'cidade_lj'                     => $this->input->post('city_loja', TRUE),
                    'bairro_lj'                     => strtoupper($this->input->post('inputBairro', TRUE)) ,
                    'endereco_lj'                   => strtoupper($this->input->post('inputEndereco', TRUE)) ,
                    'email_lj'                      => mb_strtolower($this->input->post('inputEmail4', TRUE)) ,
                    'celular_lj'                    => $this->input->post('inputTelCel', TRUE),
                    'telefone_lj'                   => $this->input->post('inputTel', TRUE),
                    'cnpj_lj'                       => $this->input->post('input_cnpj', TRUE),
                    'insc_estadual_lj'              => $this->input->post('inputInscricao_estadual', TRUE),

                    'banco_da_lj'                   => strtoupper($this->input->post('banco_nome', TRUE)) ,
                    'tipo_conta_lj'                 => $this->input->post('tipo_conta_banco', TRUE),
                    'tipo_operacao_lj'              => $this->input->post('tipo_variacao_banco', TRUE),
                    'tipo_n_agencia_lj'             => $this->input->post('tipo_numero_agencia_banco', TRUE),
                    'tipo_numero_conta_lj'          => $this->input->post('tipo_numero_conta_banco', TRUE),
                    'tipo_titular_conta_lj'         => strtoupper($this->input->post('tipo_titular_conta_banco', TRUE)) ,
                    'tipo_observacao_conta_lj'      => $this->input->post('obserbe_banco', TRUE)
                );
            
                return $this->db->insert('loja', $data);
            }

            $data = array(
                'nome_fantasia_lj' => $this->input->post('loja_nome_fant'),
                'regiao_lj' => $this->input->post('loja__regiao'),
                'estado_lj' => $this->input->post('loja_estado_br'),
                'cidade_lj' => $this->input->post('loja_cidade_br'),
                'bairro_lj' => $this->input->post('loja_bairro_br'),
                'endereco_lj' => $this->input->post('loja_endereco'),
                'email_lj' => $this->input->post('loja_email_br'),
                'celular_lj' => $this->input->post('loja_celula_br'),
                'telefone_lj' => $this->input->post('loja_telefo_br'),
                'cnpj_lj' => $this->input->post('loja_cnpj_br'),
                'insc_estadual_lj' => $this->input->post('loja__insc_uf_br'),

                'banco_da_lj'                   => strtoupper($this->input->post('loja__banco_br', TRUE)) ,
                'tipo_conta_lj'                 => $this->input->post('loja__tipoconta_br', TRUE),
                'tipo_operacao_lj'              => $this->input->post('loja__tipooperacao_br', TRUE),
                'tipo_n_agencia_lj'             => $this->input->post('loja__num_agencia_br', TRUE),
                'tipo_numero_conta_lj'          => $this->input->post('loja__num_conta_br', TRUE),
                'tipo_titular_conta_lj'         => strtoupper($this->input->post('loja__nome_titular_br', TRUE)) ,
                'tipo_observacao_conta_lj'      => $this->input->post('loja__observacao_br', TRUE)
            );
            
           return $this->db->update('loja', $data, array('id_lj' => $id));
    }



    /**verifica dados e altera dados */
    public function get_news_set($id = FALSE)
    {
        if ($id === FALSE)
        {
            /**retona todas as lojas */
            return $query = $this->db->get('lojas');
        }

        /**retorna apenas uma loja */
        $query = $this->db->get_where('loja', array('id_lj' => $id));
        return $query->result();
    }
}

/* End of file Loja_model.php */
