<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LojasController extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('Dropdown_model','dropdown');
        $this->load->model('Loja_model','loja');
	}
	public function getStates(){
        $states = array();
        $country_id = $this->input->post('country_id');
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

    public function add_loja_icash()
    {
        $this->form_validation->set_rules('inputFantazia', 'NOME FANTASIA', 'required|is_unique[loja.nome_fantasia_lj]');
        $this->form_validation->set_rules('country_loja', 'REGIÃO', 'required');
        $this->form_validation->set_rules('stateLoja', 'ESTADO', 'required');
        $this->form_validation->set_rules('city_loja', 'CIDADE', 'required');
        $this->form_validation->set_rules('inputBairro', 'BAIRRO', 'required');
        $this->form_validation->set_rules('inputEndereco', 'ENDEREÇO', 'required');
        $this->form_validation->set_rules('inputEmail4', 'EMAIL', 'required|valid_email|is_unique[loja.email_lj]');
        $this->form_validation->set_rules('inputTelCel', 'TELEFONE CELULAR', 'required');
        $this->form_validation->set_rules('inputTel', 'TELEFONE FIXO', 'required');
        $this->form_validation->set_rules('input_cnpj', 'CNPJ', 'required|is_unique[loja.cnpj_lj]');
        $this->form_validation->set_rules('inputInscricao_estadual', 'INSCRIÇÃO ESTADUAL', 'required|is_unique[loja.insc_estadual_lj]');

        $this->form_validation->set_rules('banco_nome', 'NOME DO BANCO', 'required|max_length[60]');
        $this->form_validation->set_rules('tipo_conta_banco', 'TIPO DE CONTA', 'required');
        $this->form_validation->set_rules('tipo_variacao_banco', 'NUMERO DA OPERAÇÃO', 'required|max_length[5]|numeric');
        $this->form_validation->set_rules('tipo_numero_agencia_banco', 'NUMER DA AGENCIA', 'required|max_length[10]|numeric');
        $this->form_validation->set_rules('tipo_numero_conta_banco', 'NUMERO DA CONTA', 'required|max_length[30]');
        $this->form_validation->set_rules('tipo_titular_conta_banco', 'NOME DO TITULAR DA CONTA', 'required|max_length[100]');
        $this->form_validation->set_rules('obserbe_banco', 'OBSERVAÇÃO', 'max_length[500]');


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $this->loja->add_loja_plus_icashh();
           echo json_encode(['success'=>'Loja cadastrada com sucesso.']);
        }
    }
/**get dados da loja */
    public function get_lista_lojas()
    {
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $query = $this->db->get("loja");
      $data = [];
      foreach($query->result() as $row) {

        $sub_array = array();  
        $sub_array[] = $row->id_lj;  
        $sub_array[] = $row->nome_fantasia_lj;  
        $sub_array[] = $row->email_lj;  
        $sub_array[] = $row->cnpj_lj; 
        $sub_array[] = $row->celular_lj; 
        $sub_array[] = '<div class="btn-group">
                            <button type="button" class="btn btn-danger btn-flat">Ações</button>
                            <button type="button" class="btn btn-danger btn-flat dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#" class="viewUmaLoja" id="'.$row->id_lj.'">
                                        <i class="fa fa-eye"></i> Visualizar
                                    </a>
                                </li>
                                
                                <li class="divider"></li>
                                <li>
                                    <a href="#" class="lojaDelete" id="'.$row->id_lj.'">
                                        <i class="fa fa-trash-o"></i> Deletar
                                    </a>
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
    /**pega apenas uma loja */
    public function get_loja(int $id)
    {
        $output = array();   
        $data = $this->loja->get_news_set($id);  
        foreach($data as $row)  
        {  
            $output['loja_nome_fant'] = $row->nome_fantasia_lj;  
            $output['loja_regiao_br'] = $row->regiao_lj;   
            $output['loja_estado_br'] = $row->estado_lj;   
            $output['loja_cidade_br'] = $row->cidade_lj;   
            $output['loja_bairro_br'] = $row->bairro_lj;   
            $output['loja_endereco'] = $row->endereco_lj;   
            $output['loja_email_br'] = $row->email_lj;   
            $output['loja_celula_br'] = $row->celular_lj;   
            $output['loja_telefo_br'] = $row->telefone_lj;   
            $output['loja_cnpj_br'] = $row->cnpj_lj;   
            $output['loja__insc_uf_br'] = $row->insc_estadual_lj; 

            $output['loja__banco_br'] = $row->banco_da_lj;   
            $output['loja__tipoconta_br'] = $row->tipo_conta_lj;   
            $output['loja__tipooperacao_br'] = $row->tipo_operacao_lj;   
            $output['loja__num_agencia_br'] = $row->tipo_n_agencia_lj;   
            $output['loja__num_conta_br'] = $row->tipo_numero_conta_lj;   
            $output['loja__nome_titular_br'] = $row->tipo_titular_conta_lj;   
            $output['loja__observacao_br'] = $row->tipo_observacao_conta_lj;   
        }  
        echo json_encode($output); 
    }
    /**alera dados da loja */
    public function updateDadosLoja(int $id)
    {
        $this->form_validation->set_rules('loja_nome_fant', 'NOME FANTASIA', 'required');
        $this->form_validation->set_rules('loja__regiao', 'REGIÃO', 'required');
        $this->form_validation->set_rules('loja_estado_br', 'ESTADO(UF)', 'required');
        $this->form_validation->set_rules('loja_cidade_br', 'CIDADE', 'required');
        $this->form_validation->set_rules('loja_bairro_br', 'BAIRRO', 'required');
        $this->form_validation->set_rules('loja_endereco', 'ENDEREÇO', 'required');
        $this->form_validation->set_rules('loja_email_br', 'EMAIL', 'required');
        $this->form_validation->set_rules('loja_celula_br', 'CELULAR', 'required');
        $this->form_validation->set_rules('loja_telefo_br', 'TELEFONE', 'required');
        $this->form_validation->set_rules('loja_cnpj_br', 'CNPJ', 'required');
        $this->form_validation->set_rules('loja__insc_uf_br', 'INSCRIÇÃO ESTADUAL', 'required');

        $this->form_validation->set_rules('loja__banco_br', 'NOME DO BANCO', 'required|max_length[60]');
        $this->form_validation->set_rules('loja__tipoconta_br', 'TIPO DE CONTA', 'required');
        $this->form_validation->set_rules('loja__tipooperacao_br', 'NUMERO DA OPERAÇÃO', 'required|max_length[5]|numeric');
        $this->form_validation->set_rules('loja__num_agencia_br', 'NUMER DA AGENCIA', 'required|max_length[10]|numeric');
        $this->form_validation->set_rules('loja__num_conta_br', 'NUMERO DA CONTA', 'required|max_length[30]');
        $this->form_validation->set_rules('loja__nome_titular_br', 'NOME DO TITULAR DA CONTA', 'required|max_length[100]');
        $this->form_validation->set_rules('loja__observacao_br', 'OBSERVAÇÃO', 'max_length[500]');

        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $this->loja->add_loja_plus_icashh($id);
           echo json_encode(['success'=>'Dados da loja alterado com sucesso!']);
        }
    }

    /**deleta a loja */
    public function deleteLoja(int $id)
    {
        $this->db->delete('loja', array('id_lj' => $id));
        echo 'Loja deletado com sucesso!';
    }
}

/* End of file LojasController.php */
