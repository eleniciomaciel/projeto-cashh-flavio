<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

    public function index($page = 'valida_acesso')
    {
        if (!file_exists(APPPATH . 'views/' . $page . '.php')) {
            show_404();
        }
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->view($page, $data);
    }

    public function validaDadosAcesso()
    {
        $this->form_validation->set_rules('email_pessoal', 'Email pessoal', 'required|valid_email|callback_exists_in_email_persona');
        $this->form_validation->set_rules('login_pessoal', 'Login', 'required|valid_email|callback_existe_login');
        $this->form_validation->set_rules('chave_valida1', 'Token', 'required|alpha_dash|min_length[5]|callback_existe_token');
        $this->form_validation->set_rules('chave_valida2', 'Confirmação do token', 'required|matches[chave_valida1]');
        // $this->form_validation->set_rules('new_password', 'Senha', 'required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,10}$/]',
        // array('regex_match' => 'A senha deve conter pelo menos um número e uma letra maiúscula e minúscula, no mínimo 8 até 10 caracteres e um ou mais caracter especial #$^+=!*()@%&.')
        // );

        if ($this->form_validation->run() === FALSE) {
            $this->index();
        } else {
            $log = $this->input->post('login_pessoal', TRUE);
            $data = array(
                'status_log' => '1'
            );
            $this->db->where('login_log', $log);
            $this->db->update('login_usuarios', $data);
            $this->session->set_flashdata('success', 'Validação confirmada com sucesso.');
            $this->index();
        }
    }

    /**verificando se emai existe */
    public function exists_in_email_persona($username)
    {
        $query = $this->db->get_where('usuarios_icashh', array('email_us' => $username)); 

        if ($query->num_rows() == 0 )
        {
            $this->form_validation->set_message('exists_in_email_persona', 'Este e-mail não é reconhecido em nosso sistema.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    /**verificando se login existe */
    public function existe_login($username)
    {
        $query = $this->db->get_where('login_usuarios', array('login_log' => $username)); 

        if ($query->num_rows() == 0 )
        {
                $this->form_validation->set_message('existe_login', 'Este login não está cadastrado em nosso sistema.');
                return FALSE;
        }
        else
        {
                return TRUE;
        }
    }

    /**verificando se token existe */
    public function existe_token($username)
    {
        $query = $this->db->get_where('login_usuarios', array('token_log' => $username)); 

        if ($query->num_rows() == 0 )
        {
                $this->form_validation->set_message('existe_token', 'O token não está cadastrado em nosso sistema.');
                return FALSE;
        }
        else
        {
                return TRUE;
        }
    }
}

/* End of file LoginController.php */
