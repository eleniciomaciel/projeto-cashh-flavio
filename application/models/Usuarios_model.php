<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{

    /**check login */
    public function login($email, $password){
        //$query = $this->db->get_where('login_usuarios', array('login_log'=>$email, 'senha_log'=>$password));

        $this->db->select('*');
        $this->db->from('login_usuarios');
        $this->db->join('usuarios_icashh', 'usuarios_icashh.id_us = login_usuarios.fk_user_log');
        $this->db->where('login_log', $email);
        $this->db->where('senha_log', md5($password));
        $query = $this->db->get();
        
        return $query->row_array();
    }

    public function adicionaUsuariosModal($id = FALSE)
    {
        if ($id === FALSE) {
            $data = array(
                'fk_us_loja'         => $this->input->post('nam_loja_user', TRUE),
                'nome_us'            => $this->input->post('name_userLoja', TRUE),
                'telefone_us'        => $this->input->post('input_telUser', TRUE),
                'email_us'           => $this->input->post('inputEmailUser', TRUE),
                'regiao_us'          => $this->input->post('inputRegiao_user', TRUE),
                'uf_us'              => $this->input->post('stateUser', TRUE),
                'municipio_us'       => $this->input->post('city_loja_user', TRUE),
                'nivel_us'           => $this->input->post('inputNivelUser', TRUE),
                'bairro_us'          => $this->input->post('inputBairroUser', TRUE),
                'endereco_us'        => $this->input->post('inputEnderecoUser', TRUE),
                'data_nascimento_us' => $this->input->post('inputDatNascimUser', TRUE),
                'cpf_us'             => $this->input->post('inputcpfUser', TRUE),
                'rg_us'             => $this->input->post('inputRGUser', TRUE),
                'cep_us'             => $this->input->post('inputCepUser', TRUE),
            );

            return $this->db->insert('usuarios_icashh', $data);
        }

        $this->db->select('*');
        $this->db->from('login_usuarios');
        $this->db->join('usuarios_icashh', 'usuarios_icashh.id_us = login_usuarios.fk_user_log');
        $this->db->where("fk_user_log", $id);  
        $query = $this->db->get();
        return $query->result(); 

        // $this->db->where("id_us", $id);  
        // $query=$this->db->get('usuarios_icashh');  
        // return $query->result(); 
    }

    public function update_usuario(int $id, $data)
    {
        $this->db->where("id_us", $id);  
        $this->db->update("usuarios_icashh", $data);
    }
    /**
     * inseri dados do login e altera
     */
    public function setLoginUser(int $id)
    {
        $senha = $this->input->post('senhaUserIcash');
        $better_token = md5(uniqid(rand(), true));

        $data = array(
            'login_log' => $this->input->post('loginUser_icash'),
            'senha_log' => md5($senha),
            'token_log' => $better_token
        );
        return $this->db->update('login_usuarios', $data, array('fk_user_log' => $id));
    }

        /**
     * inseri dados do login e altera
     */
    public function updateStatus(int $id)
    {
        $data = array(
            'status_log' => $this->input->post('statusOption'),
        );
        return $this->db->update('login_usuarios', $data, array('fk_user_log' => $id));
    }
}

/* End of file Usuarios_model.php */
