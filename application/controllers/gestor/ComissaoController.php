<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ComissaoController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dynamic_dependent_model');
    }

    public function fetch_state()
    {
        if ($this->input->post('country_id')) {
            echo $this->dynamic_dependent_model->fetch_state($this->input->post('country_id'));
        }
    }

    public function fetch_city()
    {
        if ($this->input->post('state_id')) {
            echo $this->dynamic_dependent_model->fetch_city($this->input->post('state_id'));
        }
    }

    public function get_transacao_bruto()
    {
        if ($this->input->post('id_vl_bruto')) {
            echo $this->dynamic_dependent_model->valor_transacao_bruto($this->input->post('id_vl_bruto'));
        }
    }

    public function fetch_loja()
    {
        if ($this->input->post('id_loja')) {
            echo $this->dynamic_dependent_model->seleciona_loja($this->input->post('id_loja'));
        }
    }

    /**
    * Store Data from this method.
    *
    * @return Response
   */
   public function addPagamento()
   {
        $this->form_validation->set_rules('numero_protocol', 'LOJA', 'required');//id da loja
        $this->form_validation->set_rules('city', 'Nº DA TRANSAÇÃO', 'required');//numero do protocolo
        $this->form_validation->set_rules('vl_pago', 'VALOR', 'required|decimal');//valo do repasse
        $this->form_validation->set_rules('inputState_pg', 'STATUS', 'required');//status do pagamento


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $this->dynamic_dependent_model->get_set_pagamentos();
           echo json_encode(['success'=>'Pagamento inserido com sucesso.']);
        }
    }

    /**lista dados da comissão */
    /**
    * lista pagamentos
    *
    * @return Response
   */
   public function get_items_pagamentos()
   {
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $query = $this->db->select('*')
                        ->from('comissao_icash')
                        ->join('loja', 'loja.id_lj = comissao_icash.fk_loja_cm')
                        ->join('transacao_planos', 'transacao_planos.id_t = comissao_icash.fk_transacao_cm')
                        ->get();
      $data = [];
      foreach($query->result() as $row) {
//echo ($row->status_cm == 1 ? 'one' :($row->status_cm == 2 ? 'two' :($row->status_cm == 3 ? 'three' :($row->status_cm == 4 ? 'four' : 'other') ) ) );
                $sub_array = array();  
                $sub_array[] = $row->id_cm;   
                $sub_array[] = $row->nome_fantasia_lj;   
                $sub_array[] = $row->n_transacao_t;   
                $sub_array[] = date('d/m/Y', strtotime($row->data_cadastro_cm));  
                $sub_array[] = 'R$ '.$row->valor_cm;  
                $sub_array[] = ($row->status_cm == 0 ? '<span class="label label-warning">Aberto</span>' :($row->status_cm == 1 ? '<span class="label label-success">Transferido</span>' :($row->status_cm == 2 ? '<span class="label label-primary">Aguardando</span>' :($row->status_cm == 3 ? '<span class="label label-danger">Pendente</span>' : 'Negado'))));  
                $sub_array[] = '<div class="btn-group">
                                    <button type="button" class="btn btn-warning">Opçãoes</button>
                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="#" class="viewPagamento" id="'.$row->id_cm.'">
                                                <i class="fa fa-eye"></i> Visualizar
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#" class="deletePagamento" id="'.$row->id_cm.'">
                                                <i class="fa fa-remove"></i> Deletar
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

   /**visualiza dados do pagamento */
   public function viewOnePagamento(int $id)
   {
    $output = array();   
    $data = $this->db->select('*')
                        ->from('comissao_icash')
                        ->join('loja', 'loja.id_lj = comissao_icash.fk_loja_cm')
                        ->join('transacao_planos', 'transacao_planos.id_t = comissao_icash.fk_transacao_cm')
                        ->where('id_cm', $id)
                        ->get();

    foreach($data->result() as $row)  
    {  
         $output['pg_dindin_loja'] = $row->nome_fantasia_lj;     
         $output['pg_dindin_transacao'] = $row->fk_transacao_cm;     
         $output['pg_dindin_valor'] = $row->valor_cm;   
         $output['pg_dindin_status'] = $row->status_cm;   
         $output['pg_dindin_observacao'] = $row->observacao_cm;
    }  
    echo json_encode($output); 
   }

   public function updateOnePagamento(int $id)
   {
    $this->dynamic_dependent_model->get_set_pagamentos($id);  
    echo 'Dados alterado com sucesso!'; 
   }

   /**deletea acerto */
   public function delete_acerto_pg(int $id)
   {
        $this->db->delete('comissao_icash', array('id_cm' => $id));
        echo 'Acerto deletado com sucesso';
   }
}

/* End of file ComissaoController.php */
