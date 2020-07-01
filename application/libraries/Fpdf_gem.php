<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fpdf_gem
{

    public function __construct()
    {
        require_once APPPATH.'third_party/fpdf/fpdf.php';
        $pdf = new FPDF();
		$pdf->AddPage();
		
		$CI =& get_instance();
		$CI->fpdf = $pdf;
    }

    

}

/* End of file Fpdf_gem.php */
