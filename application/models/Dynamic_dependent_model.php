<?php
class Dynamic_dependent_model extends CI_Model
{
    public function fetch_country()
    {
        $this->db->order_by("country_name", "ASC");
        $query = $this->db->get("country");
        return $query->result();
    }

    public function fetch_state($country_id)
    {

        $this->db->where('fk_loja_t', $country_id);
        $this->db->order_by('data_cadastro_t', 'ASC');
        $this->db->group_by('data_t');
        $query = $this->db->get('transacao_planos');

        $output = '<option value="">Selecione uma data</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->fk_loja_t . '">' . date('d/m/Y', strtotime($row->data_t)) . '</option>';
        }
        return $output;
    }

    public function fetch_city($state_id)
    {
        $this->db->where('fk_loja_t', $state_id);
        $this->db->order_by('n_transacao_t', 'ASC');
        $this->db->where('status_t', 'Aprovado');
        $query = $this->db->get('transacao_planos');
        $output = '<option value="">Selecione aqui...</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_t . '">' . $row->n_transacao_t . '</option>';
        }
        return $output;
    }

    public function valor_transacao_bruto($state_id)
    {
        $this->db->where('id_t', $state_id);
        $this->db->order_by('valor_t', 'ASC');
        $query = $this->db->get('transacao_planos');
        $output = '<option value="">Selecione um valor</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_t . '">' . $row->valor_t . '</option>';
        }
        return $output;
    }

    public function seleciona_loja($state_id)
    {
        $this->db->select('*');
        $this->db->from('transacao_planos');
        $this->db->join('loja', 'loja.id_lj = transacao_planos.fk_loja_t');
        $this->db->where('id_t', $state_id);
        $query = $this->db->get();

        // $this->db->where('fk_plano_percentual_t', $state_id);
        // $this->db->order_by('nome_fantasia_lj', 'ASC');
        // $query = $this->db->get('transacao_planos');

        $output = '<option value="">Selecione a loja</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_lj . '">' . $row->nome_fantasia_lj . '</option>';
        }
        return $output;
    }

    /**inseri e pega dados */
    public function get_set_pagamentos($slug = FALSE)
    {
        if ($slug === FALSE) {
            $id = 1;
            $data = array(
                'fk_loja_cm' => $this->input->post('numero_protocol'),//id da loja
                'fk_transacao_cm' => $this->input->post('city'),//id do protocolo
                'valor_cm' => $this->input->post('vl_pago'),
                'status_cm' => $this->input->post('inputState_pg'),
                'observacao_cm' => $this->input->post('observacao_pg'),
                'fk_usuario_cm' =>  $id
            );
            return $this->db->insert('comissao_icash', $data);
        }

        $data = array(
            'valor_cm' => $this->input->post('pg_dindin_valor'),
            'status_cm' => $this->input->post('pg_dindin_status'),
            'observacao_cm' => $this->input->post('pg_dindin_observacao')
        );

        $this->db->where('id_cm', $slug);
        $this->db->update('comissao_icash', $data);

        //$this->db->update('comissao_icash', $data, array('id_cm' => $slug));
    }
}
