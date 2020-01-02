<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('basedados');
		$this->load->model('usuarios');
	}

	public function index()
	{
		if ($this->session->has_userdata('user')) {
			$this->menuIniciar();	
		} else {
			$this->quadroLogin();
		}
	}
	public function quadroLogin()
	{
		if ($this->session->has_userdata('user')) {
			$this->menuIniciar();	
		}else{
			$this->load->view('layout/_header');
			$this->load->view('usuarios/login');
			$this->load->view('layout/_footer');
		}
	}
	public function menuIniciar()
	{
		if ($this->session->has_userdata('user')) {
			redirect('adm');
		}else{
			$this->quadroLogin();
		}	
	}
	public function verificarLogin()
	{
		if ($this->session->has_userdata('user')) {
			$this->menuIniciar();	
		}else{
			$user = $this->input->post('txt_usuario');
			$pass = $this->input->post('txt_senha');
			$info = $this->usuarios->verificaLogin($user);
			if (password_verify($pass,$info[0]['senha'])) {
				$this->session->set_userdata('user',[
					'id' => $info[0]['id'],
					'usuario' => $info[0]['usuario']
				]);
				return $this->index();
			} else {
				$this->loginInvalido();
			}
		}
	}
	public function setup()
	{
		$this->load->view('header');
		$this->load->view('layout/_header');
		$this->load->view('setup/setup');
		$this->load->view('layout/_footer');
	}

	public function resetdb()
	{
		$this->basedados->reset();
		$this->load->view('header');
		$this->load->view('layout/_header');
		$this->load->view('setup/setup');
		$dados = [
			'msg'=>'Sistema da base de dados reiniado com sucesso!',
			'tipo'=>'success'
		];
		$this->load->view('layout/_mensagem', $dados);
		$this->load->view('layout/_footer');
	}
	public function inserirUsuarios()
	{
		$this->basedados->inserirUsuarios();
		$this->load->view('header');
		$this->load->view('layout/_header');
		$this->load->view('setup/setup');
		$dados = [
			'msg'=>'Usuários inseridos com sucesso!',
			'tipo'=>'success'
		];
		$this->load->view('layout/_mensagem', $dados);
		$this->load->view('layout/_footer');
	}
	public function inserirProdutos()
	{
		$this->basedados->inserirProdutos();
		$this->load->view('header');
		$this->load->view('layout/_header');
		$this->load->view('setup/setup');
		$dados = [
			'msg'=>'Produtos inseridos com sucesso!',
			'tipo'=>'success'
		];
		$this->load->view('layout/_mensagem', $dados);
		$this->load->view('layout/_footer');
	}

	public function loginInvalido()
	{
		if ($this->session->has_userdata('user')) {
			$this->menuIniciar();	
		}else{
			$this->load->view('layout/_header');
			$this->load->view('usuarios/login');
			$dados = [
				'msg'=>'Erro de login!',
				'tipo'=>'danger',
				'link'=>'home'
			];
			$this->load->view('layout/_mensagem', $dados);
			$this->load->view('layout/_footer');
		}
	}
	public function logout()
	{
		if ($this->session->has_userdata('user')) {
			$this->session->unset_userdata('user');
			redirect('home');
		} else {
			$this->menuIniciar();
		}
	}
}
