<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosController extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('Dropdown_model','dropdown');
        $this->load->model('Loja_model','loja');
        $this->load->model('Usuarios_model','usuarios');
	}
	public function getStates(){
        $states = array();
        $country_id = $this->input->post('country_id_user');
        if($country_id){
            $con['conditions'] = array('regiao'=>$country_id);
            $states = $this->dropdown->getStateRows($con);
        }
        echo json_encode($states);
    }
    
    public function getCities(){
        $cities = array();
        $state_id = $this->input->post('state_id');
        if($state_id){
            $con['conditions'] = array('Uf'=>$state_id);
            $cities = $this->dropdown->getCityRows($con);
        }
        echo json_encode($cities);
    }

    public function adicionaUsuarios()
    {
         $this->form_validation->set_rules('nam_loja_user', 'LOJA', 'required');
         $this->form_validation->set_rules('name_userLoja', 'Nome do usuário', 'required|is_unique[usuarios_icashh.nome_us]');
         $this->form_validation->set_rules('input_telUser', 'Telefone', 'required|is_unique[usuarios_icashh.telefone_us]');
         $this->form_validation->set_rules('inputEmailUser', 'E-mail', 'required|is_unique[usuarios_icashh.email_us]');
         $this->form_validation->set_rules('inputRegiao_user', 'REGIÃO', 'required');
         $this->form_validation->set_rules('stateUser', 'UF', 'required');
         $this->form_validation->set_rules('city_loja_user', 'MUNICÍPIO', 'required');
         $this->form_validation->set_rules('inputNivelUser', 'NÍVEL DE ACESSO', 'required');
         $this->form_validation->set_rules('inputBairroUser', 'BAIRRO', 'required');
         $this->form_validation->set_rules('inputEnderecoUser', 'ENDEREÇO', 'required');
         $this->form_validation->set_rules('inputDatNascimUser', 'DATA DE NASCIMENTO', 'required');
         $this->form_validation->set_rules('inputcpfUser', 'CPF', 'required|is_unique[usuarios_icashh.cpf_us]');
         $this->form_validation->set_rules('inputRGUser', 'RG', 'required|numeric|is_unique[usuarios_icashh.rg_us]');
         $this->form_validation->set_rules('inputCepUser', 'CEP', 'required');
 
 
         if ($this->form_validation->run() == FALSE)
         {
             $errors = validation_errors();
             echo json_encode(['error'=>$errors]);
         }else{
            $this->usuarios->adicionaUsuariosModal();
            echo json_encode(['success'=>'Usuário inserido com sucesso.']);
        }
    }

    /**lista todos os usuarios cadastrados */
    public function get_usuarios()
    {
       $draw = intval($this->input->get("draw"));
       $start = intval($this->input->get("start"));
       $length = intval($this->input->get("length"));

       $query = $this->db->select('*')
                            ->from('usuarios_icashh')
                            ->join('loja', 'loja.id_lj = usuarios_icashh.fk_us_loja')
                            ->get();

       $data = []; 
       foreach($query->result() as $row) {

        $sub_array = array();  
        $sub_array[] = $row->id_us;  
        $sub_array[] = $row->nome_fantasia_lj;  
        $sub_array[] = $row->nome_us;  
        $sub_array[] = $row->email_us; 
        $sub_array[] = $row->telefone_us; 
        $sub_array[] = $row->nivel_us; 
        $sub_array[] = '<div class="btn-group">
                            <button type="button" class="btn btn-danger btn-flat">Ações</button>
                            <button type="button" class="btn btn-danger btn-flat dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#" class="viewUserIcashh" id="'.$row->id_us.'">
                                        <i class="fa fa-eye"></i> Visualizar
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dadosContrato" id="'.$row->id_us.'">
                                        <i class="fa fa-address-card-o"></i> Contrato
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="statusUpdate"  id="'.$row->id_us.'">
                                        <i class="fa fa-star-o"></i> Status
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="geraLoginUser"  id="'.$row->id_us.'">
                                        <i class="fa fa-envelope-o"></i> Login
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#" class="deleteUser" id="'.$row->id_us.'">
                                    <i class="fa fa-trash-o"></i> Deletar</a>
                                </li>
                            </ul>
                        </div>';  
        $data[] = $sub_array; 
      }
 
       $result = array(
                "draw" => $draw,
                  "recordsTotal" => $query->num_rows(),
                  "recordsFiltered" => $query->num_rows(),
                  "data" => $data
             );
       echo json_encode($result);
       exit();
    }
    /**lita dados do usuá-rio */
    public function getDadosDoUsuario(int $id)
    {
            $output = array();    
            $data = $this->usuarios->adicionaUsuariosModal($id);  
            foreach($data as $row)  
            {  
                $output['getUsr_email']         = $row->email_us; 
                $output['getUsr_nome']          = $row->nome_us;  
                
                $output['getUsr_regiao']        = $row->regiao_us	;  
                $output['getUsr_Telefone']      = $row->telefone_us;  
                $output['getUsr_uf']            = $row->uf_us;  
                $output['getUsr_municipio']     = $row->municipio_us;  
                $output['getUsr_nivel']         = $row->nivel_us;  
                $output['getUsr_bairro']        = $row->bairro_us;  
                $output['getUsr_endereco']      = $row->endereco_us;  
                $output['getUsr_dt_nacimento']  = $row->data_nascimento_us;  
                $output['getUsr_cpf']           = $row->cpf_us;  
                $output['getUsr_rg']           = $row->rg_us;  
                $output['getUsr_cepe']          = $row->cep_us;  
                $output['getUsr_user_loja']     = $row->fk_us_loja;  

                $output['getUsr_user_token']     = $row->token_log;  
                
            }  
            echo json_encode($output);  
    }
    /**alterando dados no banco */
    public function updateDadosUsuarios(int $id)
    {
        $updated_data = array(  
            'fk_us_loja'            =>      $this->input->post('getUsr_user_loja'),  
            'nome_us'               =>      $this->input->post('getUsr_nome'),  
            'telefone_us'           =>      $this->input->post('getUsr_Telefone'),  
            'email_us'              =>      $this->input->post('getUsr_email'),  
            'regiao_us'             =>      $this->input->post('getUsr_regiao'),  
            'uf_us'                 =>      $this->input->post('getUsr_uf'),  
            'municipio_us'          =>      $this->input->post('getUsr_municipio'),  
            'nivel_us'             =>       $this->input->post('getUsr_nivel'),  
            'bairro_us'            =>       $this->input->post('getUsr_bairro'),  
            'endereco_us'          =>       $this->input->post('getUsr_endereco'),  
            'data_nascimento_us'   =>       $this->input->post('getUsr_dt_nacimento'),  
            'cpf_us'               =>       $this->input->post('getUsr_cpf'),  
            'rg_us'               =>       $this->input->post('getUsr_rg'),  
            'cep_us'               =>       $this->input->post('getUsr_cepe'),  
       );    
       $this->usuarios->update_usuario($id, $updated_data);  
       echo 'Dados do usuário alterado com sucesso'; 
    }

    /**
    * metodo para validação de login do usuário.
    *
    * @return Response
    */
   public function accessUsuariosIcash(int $id)
   {
        $this->form_validation->set_rules('loginUser_icash', 'Login', 'required|valid_email|is_unique[login_usuarios.login_log]');
        $this->form_validation->set_rules('senhaUserIcash', 'Senha', 'required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,10}$/]',
        array(
                'required'      => 'O campo %s é obrigatório seu preenchimento.',
                'regex_match'     => 'A %s deve x conter pelo menos um número e uma letra maiúscula e minúscula, no mínimo 8 até 10 caracteres e um ou mais caracter especial #$^+=!*()@%&.'
        ));
        $this->form_validation->set_rules('id_usuarioLogin', 'Usuário', 'required');

        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{

            $this->usuarios->setLoginUser($id);  

            $this->db->select('*');
            $this->db->from('login_usuarios');
            $this->db->join('usuarios_icashh', 'usuarios_icashh.id_us = login_usuarios.fk_user_log');
            $this->db->where("fk_user_log", $id);  
            $query = $this->db->get();
            $row = $query->row();
            //echo $row->name;


            error_reporting(E_ALL);
            ini_set("display_Errors", 1);

            
            //$mail_user = $this->input->post('loginUser_icash');

            //$getUsr_token = $this->input->post('getUsr_token');
            //$getUsr_emailLogin = $this->input->post('getUsr_emailLogin');

            $this->email->from('atendimento@pagoos.com.br', 'Pagoos Sistema de crédito');
            $this->email->to($row->email_us);
            $this->email->subject('Acesso Pagoos Financeira');
            $this->email->message('
            <h2 style="text-align: center; color: blue;">Validação de acesso</h2>
            <h4>Olá, '.$row->nome_us.'</h4>
            <p>A Pagoos informa que seu acesso foi aprova, siga as orientações a baixo para concluir a validação.</p>

            <p>
                <ul>
                    <li>Adicione os dados gerado pelo administrador para validar o acesso.</li>
                    <li>Ao clicar no botão a baixo você será redirecionado para a área de validação.</li>
                    <li>Adicione lá o login e o token (estes a baixo) nos respectivos campos.</li>
                    <li>Após ser enviado a validação aguarde o aviso de aprovado.</li>
                    <li>Quando concluído click para acessar o ambiente de login.</li>
                    <li>Se houver algum error no processo entre em contato com o administrador da PAGOOS Financeira.</li>
                </ul>
            </p>
            <ol>
                <li>Login: '.$row->login_log.'</li>
                <li>Token: '.$row->token_log.'</li>
            </ol>  
            <a style="background-color: #f44336;
            color: white;
            padding: 15px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;" href="'.site_url('home-gestor').'" target="_blank">Click aqui para validar</a>
            ');
            $this->email->send();

            echo json_encode(['success'=>'Acesso adicionado com sucesso.']);
        }
    }
    /**pega os dados para visualizar o status */
    public function getStatusAlteraLogin(int $id)
    {
        $output = array();  
        $data = $this->db->select('*')
                            ->where('fk_user_log', $id)
                            ->get('login_usuarios'); 
        foreach($data->result() as $row)  
        {  
             $output['status_login'] = $row->status_log; 
        }  
        echo json_encode($output);
    }
    /**status do usuário */
    public function alteraStatusUserAccess(int $id)
    {
        $this->usuarios->updateStatus($id);  
        echo 'Status alterado com sucesso';
    }
    /**deleta dados usuário */
    public function deleteDadosUsuario(int $id)
    {
        $this->db->delete('usuarios_icashh', array('id_us' => $id));
        echo 'Usuário deletado com sucesso';
    }

    /**dados do contrato */
    public function dadosContrato(int $id)
    {
        $output = array();
        $data = $this->db->select('*')
                        ->from('usuarios_icashh')
                        ->join('loja', 'loja.id_lj = usuarios_icashh.fk_us_loja')
                        ->where('id_us', $id)
                        ->get();

        foreach ($data->result() as $row) {
            $output['contrato_nome'] = $row->nome_us;
            $output['contrato_cpf'] = $row->cpf_us;
            $output['contrato_rg'] = $row->rg_us;
            $output['contrato_endereco'] = $row->endereco_us;
            $output['contrato_bairro'] = $row->bairro_us;
            $output['contrato_cidade'] = $row->municipio_us;
            $output['contrato_estado'] = $row->uf_us;
            $output['contrato_banco'] = $row->banco_da_lj;
            $output['contrato_numero_conta'] = $row->tipo_numero_conta_lj;
            $output['contrato_agencia'] = $row->tipo_n_agencia_lj;
            $output['contrato_operacao'] = $row->tipo_operacao_lj;
            $output['contrato_tipo_conta'] = $row->tipo_conta_lj;
        }
        echo json_encode($output);  
    }
}

/* End of file UsuariosController.php */
