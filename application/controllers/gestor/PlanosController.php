<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PlanosController extends CI_Controller {

    public function addPlanos()
    {
        $this->form_validation->set_rules('pl_nome', 'Nome do plano', 'required');
        $this->form_validation->set_rules('pl_cor', 'Cor do plano', 'required');


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $data = array(
                'nome_pl' => $this->input->post('pl_nome'),
                'cor_pl' => $this->input->post('pl_cor'),
            );
        
            $this->db->insert('planos_icash', $data);
           echo json_encode(['success'=>'Plano inserido com sucesso.']);
        }
    }

    /**get lista de planos */
    public function get_lista_planos()
    {
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $query = $this->db->get("planos_icash");
      $data = [];

      foreach($query->result() as $row) {
           
        $sub_array = array();  
        $sub_array[] = $row->id_pl; 
        $sub_array[] = $row->nome_pl;  
        $sub_array[] = $row->cor_pl;  
        $sub_array[] = '<div class="btn-group">
                            <button type="button" class="btn btn-warning">Opções</button>
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#" class="viewPlano" id="'.$row->id_pl.'">
                                        <i class="fa fa-eye"></i> Visualizar
                                    </a>
                                </li>
                                <li>
                                    <a href="#"  class="viewComissaoPlano" id="'.$row->id_pl.'">
                                        <i class="fa fa-money"></i> Comissões do plano
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#" class="del_plano" id="'.$row->id_pl.'">
                                        <i class="fa fa-trash"></i> Deletar
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
    /**altera plano */
    public function viewPlano(int $id)
    {
        $output = array();   
           $data =  $this->db->select('*')
                            ->where('id_pl', $id)
                            ->get('planos_icash');

           foreach($data->result() as $row)  
           {  
                $output['vw_nome'] = $row->nome_pl;  
                $output['vw_cor'] = $row->cor_pl; 
           }  
           echo json_encode($output);  
    }
    /**altera plano */
    public function alteraPlano(int $id)
    {
        $data = array(  
            'nome_pl' =>     $this->input->post('get_pl_name'),  
            'cor_pl'  =>     $this->input->post('get_pl_cor')
       );  
       $this->db->update('planos_icash', $data, array('id_pl' => $id));
       echo 'Plano alterado com sucesso';
    }

    /**adiciona plano e comissao */
    public function addPlanoComissao()
    {
        $data = array(  
            'fk_pano' =>     $this->input->post('id_user_plc'),  
            'parcelas_pc'  =>     $this->input->post('plc_parcelas'),
            'percentual_pc'  =>     $this->input->post('pc_plano')
       );  
       $this->db->insert('plano_comissao_pc', $data);
       echo 'Plano inserido com sucesso';
    }

    /**get lista comissão */
    /**get lista de planos */
    public function get_lista_comissao()
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
        $sub_array[] = $row->nome_pl; 
        $sub_array[] = $row->cor_pl; 
        $sub_array[] = $row->parcelas_pc.' X';  
        $sub_array[] = '<span class="badge bg-red">'.$row->percentual_pc.'%</span>';  
        $sub_array[] = '<button type="button" class="del_plano_comissao_01 btn bg-navy btn-flat margin" id="'.$row->id.'">
                            <i class="fa fa-trash-o"></i> Deletar
                        </button>';  
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
/**deleta plano */
   public function delPlanoUser(int $id)
    {
        $this->db->delete('planos_icash', array('id_pl' => $id));
        echo 'Plano deletado com sucesso';
    }

    /**deleta comissao */
   public function delPlanoUserComissao(int $id)
   {
       $this->db->delete('plano_comissao_pc', array('id' => $id));
       echo 'Comissão do plano deletado com sucesso';
   }
   /**lista os planos no select */
    public function get_select_plano(){
        $category_id = $this->input->post('id',TRUE);
        $data = $this->get_sub_category($category_id)->result();
        echo json_encode($data);
    }
    public function get_sub_category($category_id){
        $query = $this->db->get_where('plano_comissao_pc', array('fk_pano' => $category_id));
        return $query;
    }
}

/* End of file PlanosController.php */
