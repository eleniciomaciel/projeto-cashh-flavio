<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PerfilController extends CI_Controller {

    public function index(int $id)
    {
        $output = array();    
            $data = $this->db->select('*')
                                ->from('usuarios_icashh')
                                 ->join('regiao', 'regiao.Id = usuarios_icashh.regiao_us')
                                // ->join('estado', 'estado.Id = usuarios_icashh.uf_us')
                                // ->join('municipio', 'municipio.Id = usuarios_icashh.municipio_us')
                                ->join('loja', 'loja.id_lj = usuarios_icashh.fk_us_loja')
                                ->where('id_us', $id)
                                ->get();
              
            foreach($data->result() as $row)  
            {  
                $output['getUsrLogis_email']         = $row->email_us; 
                $output['getUsrLogis_nome']          = $row->nome_us;  
                
                $output['getUsrLogis_regiao']        = $row->regiao_us	;  
                $output['getUsrLogis_Telefone']      = $row->telefone_us;  
                $output['getUsrLogis_uf']            = $row->uf_us;  
                $output['getUsrLogis_municipio']     = $row->municipio_us;  
                $output['getUsrLogis_nivel']         = $row->nivel_us;  
                $output['getUsrLogis_bairro']        = $row->bairro_us;  
                $output['getUsrLogis_endereco']      = $row->endereco_us;  
                $output['getUsrLogis_dt_nacimento']  = $row->data_nascimento_us;  
                $output['getUsrLogis_cpf']           = $row->cpf_us;  
                $output['getUsrLogis_cepe']          = $row->cep_us;  
                $output['getUsrLogis_loja']          = $row->nome_fantasia_lj;  
                //$output['getUsrLogis_user_loja']     = $row->fk_us_loja;  
                
            }  
            echo json_encode($output); 
    }

    public function login_view(int $id)
    {
        $output = array();    
            $data = $this->db->select('*')
                                ->from('login_usuarios')
                                ->join('usuarios_icashh', 'usuarios_icashh.id_us = login_usuarios.fk_user_log')
                                ->where('fk_user_log', $id)
                                ->get();
              
            foreach($data->result() as $row)  
            {  
                $output['login_logista_email']         = $row->login_log; 
                $output['login_logista_id']          = $row->int_log;   
                
            }  
            echo json_encode($output); 
    }
    /**altera login do usuário */
    public function updatePasswordLogista(int $id)
    {
        $this->form_validation->set_rules('login_logista_id', 'ID do Login', 'required');
        $this->form_validation->set_rules('logista_new_senha', 'Senha', 'required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,10}$/]',
        array(
                'required'      => 'O campo %s é obrigatório seu preenchimento.',
                'regex_match'     => 'A %s deve conter pelo menos um número e uma letra maiúscula e minúscula, no mínimo 8 até 10 caracteres e um ou mais caracter especial #$^+=!*()@%&.'
        ));


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $data = array(
                'senha_log' => md5($this->input->post('logista_new_senha', TRUE))
            );
            $this->db->update(' login_usuarios', $data, array('int_log' => $id));
           echo json_encode(['success'=>'Senha alterada com sucesso.']);
        }
    }

}

/* End of file PerfilController.php */
