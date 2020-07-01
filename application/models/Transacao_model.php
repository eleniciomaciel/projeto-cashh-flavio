<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transacao_model extends CI_Model
{

    public function get_news($slug = FALSE)
    {
        if ($slug === FALSE) {
            $id = 1;
            $data = array(
                'fk_loja_t'                 => $this->input->post('loja_id'),
                'protocolo_t'               => $this->input->post('trs_protocolo'),
                'valor_t'                   => $this->input->post('trs_valor'),
                'fk_plano_cor_t'            => $this->input->post('select_plano'),
                'fk_plano_percentual_t'     => $this->input->post('categoria_sub_cor'),
                'data_t'                    => $this->input->post('trs_data'),
                'n_transacao_t'             => $this->input->post('trs_num_transacao'),
                'fk_user'                   => $id,
                'observacao_t'              => $this->input->post('text_bserve')
            );

            return $this->db->insert(' transacao_planos', $data);
        }

        $data = array(
            'fk_loja_t'          =>     $this->input->post('gt_pl_loja'),
            'protocolo_t'               =>     $this->input->post('gt_pl_protocol'),
            'valor_t'               =>     $this->input->post('gt_pl_valor'),
            'fk_plano_cor_t'               =>     $this->input->post('gt_pl_plano_cor'),
            'data_t'               =>     $this->input->post('gt_pl_data'),
            'n_transacao_t'               =>     $this->input->post('gt_pl_n_transacao'),
            'observacao_t'               =>     $this->input->post('gt_pl_observacao')
        );
        $this->db->update('transacao_planos', $data, array('id_t' => $slug));
    }

    /**altera o status da transação */
    public function update_ts(int $id)
    {
        $data = array(
            'status_t' =>  $this->input->post('gt_pl_status_sts')
        );
        $this->db->update('transacao_planos', $data, array('id_t' => $id));
    }


    /**transação do logista */
    public function get_news_cliente_logista($slug = FALSE)
    {
        if ($slug === FALSE) {
            $data_hoje = date('Y-m-d H:i:s');
            $token = md5(uniqid(""));
            $data = array(
                'fk_loja_t'                 => $this->input->post('usuario_loja'),
                'protocolo_t'               => $this->input->post('cliente_protocolo'),
                'valor_t'                   => $this->input->post('cliente_valor'),
                'fk_plano_cor_t'            => $this->input->post('cor_pano_logista'),
                'fk_plano_percentual_t'     => $this->input->post('select_parcelas_porcentual_logista'),
                'data_t'                    => $data_hoje,
                'n_transacao_t'             => $token,
                'fk_user'                   => $this->input->post('usuario_logista_is'),
                'observacao_t'              => $this->input->post('cliente_dados_bancario'),
                'cliente_t'             => $this->input->post('cliente_logista'),
                'telefone_t'            => $this->input->post('tel_user_cliente'),
                'email_t'               => $this->input->post('cliente_email'),
                'regiao_t'              => $this->input->post('loja_logista'),
                'estado_t'              => $this->input->post('stateLoja_logista'),
                'cidade_t'              => $this->input->post('city_loja_logista'),
                'bairro_t'              => $this->input->post('cliente_bairro'),
                'endereco_t'            => $this->input->post('cliente_endereco'),
                'cep_t'                 => $this->input->post('cliente_cep'),

            );

            return $this->db->insert('transacao_planos', $data);
        }

    }
}

/* End of file Transacao_model.php */
