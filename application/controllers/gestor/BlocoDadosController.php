<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BlocoDadosController extends CI_Controller {

    public function total_loja()
    {
        $query = $this->db->count_all_results('loja');
        echo json_encode($query);
    }

}

/* End of file BlocoDadosController.php */
