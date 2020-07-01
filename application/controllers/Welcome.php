<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Usuarios_model','Usuarios_model');
	}
	

	public function home_site()
	{
		$data['title'] = 'Pagoos::Créditos';
		$this->load->view('site_home', $data);
		
	}
	public function index()
	{
		//restrict users to go back to login if session has been set
		
		if ($this->session->userdata('user') && $this->session->userdata('user')['nivel_us'] == 'Administrador') {
			redirect('welcome/home');
			
		}elseif ($this->session->userdata('user') && $this->session->userdata('user')['nivel_us'] == 'Logista') {
			redirect('welcome/page_logista');
		}elseif ($this->session->userdata('user') && $this->session->userdata('user')['nivel_us'] == 'Gerente') {
			redirect('welcome/page_gerente');
		} else {
			$this->load->view('welcome_message');
		}
	}
	public function login()
	{
		$output = array('error' => false);

		$email = $this->input->post('email', TRUE);
		$password = $this->input->post('password', TRUE);

		$data = $this->Usuarios_model->login($email, $password);

		if ($data && $data['status_log'] == '1') {
			$this->session->set_userdata('user', $data);
			$output['message'] = 'A iniciar sessão. Aguarde ...';
		} else {
			$output['error'] = true;
			$output['message'] = 'Dados de acesso inválido.';
		}

		echo json_encode($output);
	}

	public function home()
	{
		//restrict users to go to home if not logged in
		if ($this->session->userdata('user')) {
			$data['home'] = 'Home-gestor';
			$this->load->view('gestor/partial/header-html', $data);
			$this->load->view('gestor/partial/menu-html');
			$this->load->view('gestor/partial/aside-html');
			$this->load->view('gestor/home');
			$this->load->view('gestor/partial/footer');
			$this->load->view('gestor/partial/footer-html');
		} else {
			redirect('/');
		}
	}

	public function page_logista()
	{
		if ($this->session->userdata('user')) {
			$data['home'] = 'Home-usuário';
			$this->load->view('logista/template/header-template', $data);
			$this->load->view('logista/template/sidebar-template');
			$this->load->view('logista/template/menubar-template');
			$this->load->view('logista/index');
			$this->load->view('logista/template/footer-template');
		// $this->load->view('gestor/partial/footer-html');
		} else {
			redirect('/');
		}
	}

	public function page_gerente()
	{
		if ($this->session->userdata('user')) {
		 $data['title'] = 'gerente::comercial';
		//$this->load->view('logista/template/header-template', $data);
		//$this->load->view('logista/template/sidebar-template');
		//$this->load->view('logista/template/menubar-template');
		$this->load->view('gerente-comercial/gerente', $data);
		//$this->load->view('logista/template/footer-template');
		// $this->load->view('gestor/partial/footer-html');
		} else {
			redirect('/');
		}
	}
	public function logout()
	{
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('/');
	}

	
}
