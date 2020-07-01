<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TransacaoController extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transacao_model','model_trasacao');
        
    }
    
    public function addTransacao()
    {
        $this->form_validation->set_rules('loja_id', 'LOJA', 'required');
        $this->form_validation->set_rules('trs_protocolo', 'PROTOCOLO', 'required|is_unique[transacao_planos.protocolo_t]');
        $this->form_validation->set_rules('trs_valor', 'VALOR', 'required|decimal');
        $this->form_validation->set_rules('select_plano', 'PLANO', 'required');
        $this->form_validation->set_rules('categoria_sub_cor', 'PARCELAS/PERCENTUAL', 'required');
        $this->form_validation->set_rules('trs_data', 'DATA DA TRANSAÇÃO', 'required');
        $this->form_validation->set_rules('trs_num_transacao', 'Nº TRANSAÇÃO', 'required|is_unique[transacao_planos.n_transacao_t]');


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $this->model_trasacao->get_news();
           echo json_encode(['success'=>'Transação realizada com sucesso.']);
        }
    }

    public function get_lista_transacao()
   {
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $query =  $this->db->select('*')
                            ->from('transacao_planos')
                            ->join('loja', 'loja.id_lj = transacao_planos.fk_loja_t')
                            ->join('planos_icash', 'planos_icash.id_pl = transacao_planos.fk_plano_cor_t')
                            ->join('plano_comissao_pc', 'plano_comissao_pc.id = transacao_planos.fk_plano_percentual_t')
                            ->get();
      
      $data = [];

      foreach($query->result() as $row) {

        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

        $sub_array = array();  
        $sub_array[] = $row->id_t;
        $sub_array[] = $row->nome_fantasia_lj;  
        $sub_array[] = ($row->status_t == 'Aberto' ? '<span class="label label-warning">Aberto</span>' :($row->status_t == 'Aprovado' ? '<span class="label label-success">Aprovado</span>' :($row->status_t == 'Aguardando' ? '<span class="label label-primary">Aguardando</span>' :($row->status_t == 'Pendente' ? '<span class="label label-danger">Pendente</span>' : '<span class="badge bg-purple">Negado</span>'))));

        $sub_array[] = date('W F l- d/m/Y', strtotime($row->data_t));  
        $sub_array[] = $row->protocolo_t;  
        $sub_array[] = $row->n_transacao_t;  
        $sub_array[] = '<div class="btn-group">
                            <button type="button" class="btn btn-info">Opções</button>
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#" class="verDadosTransacao" id="'.$row->id_t.'">Visualizar</a>
                                </li>
                                <li>
                                    <a href="#"  class="statusDadosTransacao" id="'.$row->id_t.'">Status</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                <a href="#" class="deleteTransacao" id="'.$row->id_t.'">Deletar</a>
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

   /**lista a transação seecionada */
   public function getPlanoTransacao_one(int $id)
   {
    $output = array();  
    $data =  $this->db->select('*')
                    ->from('transacao_planos')
                    ->join('loja', 'loja.id_lj = transacao_planos.fk_loja_t')
                    ->join('planos_icash', 'planos_icash.id_pl = transacao_planos.fk_plano_cor_t')
                    ->join('plano_comissao_pc', 'plano_comissao_pc.id = transacao_planos.fk_plano_percentual_t')
                    ->where('id_t',$id)
                    ->get();

        foreach($data->result() as $row)  
        {  
            $output['gt_pl_loja']              = $row->fk_loja_t;  
            $output['gt_pl_protocol']          = $row->protocolo_t;  
            $output['gt_pl_valor']             = $row->valor_t;  
            $output['gt_pl_plano_cor']         = $row->fk_plano_cor_t;  
            $output['gt_pl_plano_percentual']  = $row->fk_plano_percentual_t;  
            $output['gt_pl_data']              = $row->data_t;  
            $output['gt_pl_n_transacao']       = $row->n_transacao_t;  
            $output['gt_pl_user']              = $row->fk_user;  
            $output['gt_pl_status']            = $row->status_t;  
            $output['gt_pl_observacao']        = $row->observacao_t;  
            $output['gt_pl_fantasiaNome']        = $row->nome_fantasia_lj; 
            
            $output['gt_pl_cor_status']        = $row->cor_pl;  
            $output['gt_pl_per_status']        = $row->percentual_pc;  
            $output['gt_pl_val_status']        = $row->valor_t;  
            

        }  
        echo json_encode($output); 
   }

   /**altera dados da transação */
   public function updatePlanoTransacao_one(int $id)
   { 
    $this->model_trasacao->get_news($id);  
    echo 'Dados alterado com sucesso'; 
   }

   /**altera o status da transação */
    public function updateStatus(int $id)
    { 
    $this->model_trasacao->update_ts($id);  
    echo 'Dados alterado com sucesso'; 
    }

    /**deletando transação */
    public function deleteTransacao(int $id)
    {
        $this->db->delete('transacao_planos', array('id_t' => $id));
        echo 'Transação deletada com sucesso!';
    }
}

/* End of file TransacaoController.php */
