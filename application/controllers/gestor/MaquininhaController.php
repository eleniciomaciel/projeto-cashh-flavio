<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MaquininhaController extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Maquinas_model');
    }
    
    public function index()
    {
        //sleep(2);
        $this->form_validation->set_rules('inputNumMaquina', 'nº da maquininha', 'required|max_length[60]|is_unique[cad_maquininhas.maq_numero]');
        $this->form_validation->set_rules('inputdataAquisicao', 'data de aquisição', 'required');
        $this->form_validation->set_rules('inputModelo', 'modelo', 'required|max_length[100]');
        $this->form_validation->set_rules('inputFornecedor', 'fornecedor', 'required|max_length[100]');
        $this->form_validation->set_rules('inputTelFornecedor', 'telefone', 'required|max_length[16]');
        $this->form_validation->set_rules('inpuEmailFornecedor', 'Email do fornecedor', 'required|valid_email|max_length[60]');
        $this->form_validation->set_rules('inputGarantia', 'numero da garantia', 'required|max_length[12]');
        $this->form_validation->set_rules('nogarantia', 'possui garantia', 'in_list[0,1]');


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{

            $data = array(
                'maq_numero'            =>  $this->input->post('inputNumMaquina'),
                'maq_data_aquisicao'    =>  $this->input->post('inputdataAquisicao'),
                'maq_modelo'            =>  $this->input->post('inputModelo'),
                'maq_fornecedor'        =>  $this->input->post('inputFornecedor'),
                'maq_telefone'          =>  $this->input->post('inputTelFornecedor'),
                'maq_email'             =>  $this->input->post('inpuEmailFornecedor'),
                'maq_num_garantia'      =>  $this->input->post('inputGarantia'),
                'maq_garantias'         =>  $this->input->post('nogarantia')
            );
        
            $this->db->insert('cad_maquininhas', $data);
            echo json_encode(['success'=>'Maquininha adicionada com sucesso.']);
        }
    }

    /**lista maquinas */
    public function getLista_maquininhas_select() { 
        $result = $this->db->where("maq_status",'0')->get("cad_maquininhas")->result();
        echo json_encode($result);
    }
    /**lista loja */
    public function getListaloja_select() { 
        $result = $this->db->get("loja")->result();
        echo json_encode($result);
    }

    /**adiciona maquininha a loja */
    public function add_loja_maquininhas()
    {
        $this->form_validation->set_rules('list_select_maquininhas', 'nº da maquininha', 'required');
        $this->form_validation->set_rules('list_select_lojas', 'loja', 'required|callback_check_maquina_loja_ja_cadastrada');
        //$this->form_validation->set_rules('email', 'Email', 'required|valid_email');


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $this->Maquinas_model->set_get_maquina_lojas();
            $this->altera_status_da_maquina($this->input->post('list_select_maquininhas'));
           echo json_encode(['success'=>'Maquina adiciona a loja com sucesso.']);
        }
    }
    /**verifica se estão duas maquinas na mesma loja */
    public function check_maquina_loja_ja_cadastrada()
    {
        $firstname = $this->input->post('list_select_maquininhas');
        $lastname = $this->input->post('list_select_lojas');

        $check = $this->db->get_where('loja_com_maquinas', array('fk_id_maquina' => $firstname, 'fk_id_loja' => $lastname), 1);

        if ($check->num_rows() > 0) {
            $this->form_validation->set_message('check_maquina_loja_ja_cadastrada', 'Essa maquina já se encontra cadastrada para essa loja.');
            return FALSE;
        }
        return TRUE;
    }
    /**altera o id da maquininha como já cadastrada */
    public function altera_status_da_maquina(int $id)
    {
        $data = array(
            'maq_status' => '1',
        );
    
        return $this->db->update('cad_maquininhas', $data, array('maq_id' => $id));
    }

    /**lista maquinas e lojas */
    public function add_maquinas_lojas()
   {
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));


        $this->db->select('*');
        $this->db->from('loja_com_maquinas');
        $this->db->join('cad_maquininhas', 'cad_maquininhas.maq_id = loja_com_maquinas.fk_id_maquina');
        $this->db->join('loja', 'loja.id_lj = loja_com_maquinas.fk_id_loja');
        $query = $this->db->get();


      $data = [];


      foreach($query->result() as $r) {
           $data[] = array(
                $r->nome_fantasia_lj,
                $r->maq_numero,
                date("d/m/Y", strtotime($r->created_data)),
                '<div class="btn-group">
                <button type="button" class="btn btn-warning">Opções</button>
                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#"><i class="fa fa-eye"></i> Visualizar</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="fa fa-trash-o"></i> Deletar</a></li>
                </ul>
              </div>'
           );
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

}

/* End of file MaquininhaController.php */
