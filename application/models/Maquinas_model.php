<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Maquinas_model extends CI_Model {

    public function set_get_maquina_lojas()
    {
        $data = array(
            'fk_id_maquina' => $this->input->post('list_select_maquininhas'),
            'fk_id_loja' => $this->input->post('list_select_lojas')
        );
    
        return $this->db->insert('loja_com_maquinas', $data);
    }

}

/* End of file Maquinas_model.php */
