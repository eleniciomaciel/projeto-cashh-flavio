<?php

use phpDocumentor\Reflection\Types\Null_;

defined('BASEPATH') OR exit('No direct script access allowed');

class LogistaClientes extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transacao_model', 'model_trasacao');
        
    }

    public function get_meus_planos(int $id)
   {
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $query = $this->db->select('*')
                            ->from('transacao_planos')
                            ->join('planos_icash', 'planos_icash.id_pl = transacao_planos.fk_plano_cor_t')
                            ->join('plano_comissao_pc', 'plano_comissao_pc.id = transacao_planos.fk_plano_percentual_t')
                            ->where('fk_user', $id)
                            ->get();
      $data = [];

      foreach($query->result() as $row) {

        $sub_array = array();  
        $sub_array[] = date('d/m/Y H:i:s', strtotime($row->data_cadastro_t)); 
        $sub_array[] = $row->cliente_t;  
        $sub_array[] = $row->telefone_t;  
        $sub_array[] = $row->cor_pl;
        $sub_array[] = $row->parcelas_pc.' X'; 
        $sub_array[] = 'R$ '.$row->valor_t;   
        $sub_array[] = ($row->status_t == 'Aberto' ? '<span class="badge badge-warning">Aberto</span>' :($row->status_t == 'Aprovado' ? '<span class="badge badge-success">Transferido</span>' :($row->status_t == 'Aguardando' ? '<span class="badge badge-dark">Aguardando</span>' :($row->status_t == 'Pendente' ? '<span class="badge badge-info">Pendente</span>' : '<span class="badge badge-danger">Negado</span>'))));
        $sub_array[] = $row->n_transacao_t;
        $sub_array[] = '<a href="#" class="viewCliente btn btn-primary btn-icon-split" id="'.$row->id_t.'">
                            <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                            </span>
                            <span class="text">Ver</span>
                        </a>';
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

    public function add_cliente()
    {
        $this->form_validation->set_rules('cliente_logista', 'Cliente', 'required|max_length[100]');
        $this->form_validation->set_rules('tel_user_cliente', 'TELEFONE', 'required|max_length[20]');
        $this->form_validation->set_rules('cliente_email', 'EMAIL', 'required|max_length[50]');
        $this->form_validation->set_rules('loja_logista', 'REGIÃO', 'required');
        $this->form_validation->set_rules('stateLoja_logista', 'ESTADO(UF)', 'required');
        $this->form_validation->set_rules('city_loja_logista', 'CIDADE', 'required');
        $this->form_validation->set_rules('cliente_bairro', 'BAIRRO', 'required|max_length[100]');
        $this->form_validation->set_rules('cliente_endereco', 'ENDEREÇO', 'required|max_length[150]');
        $this->form_validation->set_rules('cliente_cep', 'CEP', 'required|exact_length[10]');
        $this->form_validation->set_rules('cor_pano_logista', 'COR DO PLANO', 'required');
        $this->form_validation->set_rules('select_parcelas_porcentual_logista', 'PARCELAS', 'required');
        $this->form_validation->set_rules('cliente_valor', 'VALOR', 'required|decimal');
        $this->form_validation->set_rules('cliente_dados_bancario', 'DADOS BANCÁRIO', 'required|max_length[1000]');
        $this->form_validation->set_rules('cliente_protocolo', 'Nº PROTOCOLO', 'required|is_unique[transacao_planos.n_transacao_t]|max_length[50]');
        $this->form_validation->set_rules('usuario_logista_is', 'USUÁRIO NÃO EXISTE', 'required');


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $this->model_trasacao->get_news_cliente_logista();
           echo json_encode(['success'=>'Transação realizada com sucesso.']);
        }
    }

    /**lista de cores planos e consulta */
    public function get_comissoes()
    {
       $draw = intval($this->input->get("draw"));
       $start = intval($this->input->get("start"));
       $length = intval($this->input->get("length"));

       $query = $this->db->select('*')
                        ->from('plano_comissao_pc')
                        ->join('planos_icash', 'planos_icash.id_pl = plano_comissao_pc.fk_pano')
                        ->get();
       $data = [];
       foreach($query->result() as $row) {

            $sub_array = array();  
            $sub_array[] = $row->id;  
            $sub_array[] = $row->cor_pl;  
            $sub_array[] = $row->parcelas_pc.' X';  
            $sub_array[] = $row->percentual_pc.' %';    
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

    /**LISTAGEM DOS ACERTOS */
    public function get_lista_acertos(int $id)
   {
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $query = $this->db->select('*')
                        ->from('comissao_icash')
                        ->join('loja', 'loja.id_lj = comissao_icash.fk_loja_cm')
                        ->join('transacao_planos', 'transacao_planos.id_t = comissao_icash.fk_transacao_cm')
                        ->where('fk_loja_cm', $id)
                        ->get();
      $data = [];

      foreach($query->result() as $row) {
           
        $sub_array = array();  
        $sub_array[] = $row->id_cm;  
        $sub_array[] = date('d/m/Y', strtotime($row->data_cadastro_cm));  
        $sub_array[] = $row->n_transacao_t;  
        $sub_array[] = ($row->status_cm == 0 ? '<span class="badge badge-warning">Aberto</span>' :($row->status_cm == 1 ? '<span class="badge badge-success">Transferido</span>' :($row->status_cm == 2 ? '<span class="badge badge-light">Aguardando</span>' :($row->status_cm == 3 ? '<span class="badge badge-danger">Pendente</span>' : 'Negado'))));  
        $sub_array[] = $row->valor_cm;    
        $sub_array[] = $row->valor_t;    
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
   /**lista do cliente dados */
   public function get_lista_clientesDados(int $id)
   {
    $output = array();   
    $data =$query = $this->db->select('*')
                            ->from('transacao_planos')
                            ->join('regiao', 'regiao.Id = transacao_planos.regiao_t')
                            ->join('plano_comissao_pc', 'plano_comissao_pc.id = transacao_planos.fk_plano_percentual_t')
                            //->join('municipio', 'municipio.Id = transacao_planos.cidade_t')
                            ->where('id_t', $id)
                            ->get();
                            
    foreach($data->result() as $row)  
    {  
         $output['clienteDados_cliente'] = $row->cliente_t;  
         $output['clienteDados_telefone'] = $row->telefone_t;    
         $output['clienteDados_email'] = $row->email_t;    

          $output['clienteDados_regiao'] = $row->regiao_t;    
        //   $output['clienteDados_estado'] = $row->estado_t;    
        //   $output['clienteDados_cidade'] = $row->cidade_t;   

         $output['clienteDados_bairro'] = $row->bairro_t;    
         $output['clienteDados_endereco'] = $row->endereco_t;    
         $output['clienteDados_cepe'] = $row->cep_t;    
         $output['clienteDados_n_trans'] = $row->n_transacao_t;    
         $output['clienteDados_plano_cor'] = $row->fk_plano_cor_t;    
         $output['clienteDados_plano_percenti'] = $row->fk_plano_percentual_t;    
         $output['clienteDados_valor'] = $row->valor_t;    
         $output['clienteDados_observacao'] = $row->observacao_t;    
    }  
    echo json_encode($output);  
   }
   /**download */
   public function download()
   {
    $this->load->helper('download');	
    force_download("contrato.pdf", file_get_contents("/assets/download/contrato.pdf"));
   }
}

/* End of file LogistaClientes.php */
