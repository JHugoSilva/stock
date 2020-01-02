<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('stock');
    }
    
    public function index(){
        if ($this->session->has_userdata('user')) {
            $this->load->view('layout/_header');
            $dados['produtos'] = $this->stock->getAll();
            $this->load->view('stock/home',$dados);
            $this->load->view('layout/_footer');
		} else {
			redirect('home');
		}
    }

    public function editar($id){
        if ($this->session->has_userdata('user')) {
            $this->load->view('layout/_header');
            $dados['produto'] = $this->stock->getProdutoId($id)[0];
            $this->load->view('stock/editar',$dados);
            $this->load->view('layout/_footer');
		} else {
			redirect('home');
		}
    }

    public function update($id){
        if ($this->session->has_userdata('user')) {
            $produto = $this->stock->editProduto($id);
            if (!$produto['result']) {
                $this->load->view('layout/_header');
                $dados['produto'] = $this->stock->getProdutoId($id)[0];
                $dados['msg'] = $produto['msg'];
                $this->load->view('stock/editar',$dados);
                $this->load->view('layout/_footer');
            } else {
			    redirect('home');
            }
		} else {
			redirect('home');
		}
    }
    public function new(){
        if ($this->session->has_userdata('user')) {
                $this->load->view('layout/_header');
                $this->load->view('stock/novo');
                $this->load->view('layout/_footer');
		} else {
			redirect('home');
		}
    }
    public function insert(){
        if ($this->session->has_userdata('user')) {
                $data = $this->stock->insert();
                if (!$data['result']) {
                    $this->load->view('layout/_header');
                    $this->load->view('stock/novo',$data);
                    $this->load->view('layout/_footer');
                    
                } else {
			        redirect('home');
                }
		} else {
			redirect('home');
		}
    }
    public function delete($id, $resp=false){
        if (!$resp) {
             $this->load->view('layout/_header');
             $dados['produto'] = $this->stock->getProdutoId($id)[0];
             $this->load->view('stock/eliminar',$dados);
             $this->load->view('layout/_footer');
        } else {
            $this->stock->delete($id);
            $this->index();
        }
    }
    public function add($id){
        if (is_null($this->input->post('count_qtd'))) {
            $this->load->view('layout/_header');
            $dados['produto'] = $this->stock->getProdutoId($id)[0];
            $this->load->view('stock/adicionar',$dados);
            $this->load->view('layout/_footer');    
        } else {
            $this->stock->alterarQtd($id, $this->input->post('count_qtd'));
			redirect('home');
        }
    }
    public function sub($id){
        if (is_null($this->input->post('count_qtd'))) {
            $this->load->view('layout/_header');
            $dados['produto'] = $this->stock->getProdutoId($id)[0];
            $this->load->view('stock/subtrair',$dados);
            $this->load->view('layout/_footer');    
        } else {
            $this->stock->alterarQtd($id, -$this->input->post('count_qtd'));
			redirect('home');
        } 
    }
    public function movimentos(){
        if ($this->session->has_userdata('user')) {
             $this->load->view('layout/_header');
             $dados['movimentos'] = $this->stock->movimentos();
             $this->load->view('stock/movimentos',$dados);
             $this->load->view('layout/_footer');
		} else {
			redirect('home');
		}
    }
    public function clearmov(){
     $this->stock->clearMov();
     $this->movimentos();   
    }
}