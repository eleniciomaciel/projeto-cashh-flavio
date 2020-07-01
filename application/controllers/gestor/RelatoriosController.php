<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RelatoriosController extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function index()
    {
        header("Content-Type: text/html; charset=UTF-8",true);
        
        $this->load->library('fpdf_gem');
		$this->fpdf->SetFont('Arial','B',13);
		$this->fpdf->Cell(50,10,'Contrato de credenciamento, adesao e parceria  comercial');
        
        $this->fpdf->Ln(7);
        $this->fpdf->SetFont('Arial','B',13);
		$this->fpdf->Cell(50,10,'PDV : PS S/N ');
        
        // Arial 12
        $this->fpdf->Ln(7);
        $this->fpdf->SetFont('Arial','',12);
        // Background color
        $this->fpdf->SetFillColor(200,220,255);
        // Title
        $this->fpdf->Cell(0,6,"www.pagoos.com.br / www.pagoos.net.br",0,1,'L',true);
        // Line break
        $this->fpdf->Ln(4);
        $this->fpdf->Write(5,"IDENTIFICAÇÃO DAS PARTES:
 

 
        CONTRATADO: SUPERA INTERMEDIACAO DE NEGOCIOS EIRELI, pessoa jurídica de direito privado, inscrita no CNPJ sob o n°: 32.922.547/0001-30, localizada à AV DOIS DE JULHO, N°33, LOJA 06, 2° ANDAR, CENTRO, SENHOR DO BONFIM, ESTADO DA BAHIA.
            
        CONTRATANTE: (Nome_______________), pessoa física de direito privado, maior, (estado civil), inscrito no CPF sob o ° _________________, e documento de identidade n° _______________, na _____/Ba, residente e domiciliado à __________________________, Bairro __________, Cidade de ____________________, Estado ________.
        
        As partes acima identificadas acordam com o presente CONTRATO DE PRESTAÇÃO DE SERVIÇO, que se regera pelas clausulas seguintes:
        ");

		echo $this->fpdf->Output();// Name of PDF file
		//Can change the type from D=Download the file		
    }

}

/* End of file RelatoriosController.php */
