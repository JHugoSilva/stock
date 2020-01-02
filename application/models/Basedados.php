<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basedados extends CI_Model {

   public function reset()
   {
	   $this->db->empty_table('usuarios');
	   $this->db->empty_table('produtos');
	   $this->db->empty_table('movimentos');

	   $this->db->query('ALTER TABLE usuarios AUTO_INCREMENT = 1');
	   $this->db->query('ALTER TABLE produtos AUTO_INCREMENT = 1');
	   $this->db->query('ALTER TABLE movimentos AUTO_INCREMENT = 1');
   }
   public function inserirUsuarios()
   {
	$this->db->empty_table('usuarios');
	   $data = [
		   'usuario' => 'hugo',
		   'senha' => password_hash('123',PASSWORD_DEFAULT)
	   ];
	   $this->db->insert('usuarios',$data);

	   $data = [
		'usuario' => 'maria',
		'senha' => password_hash('123',PASSWORD_DEFAULT)
	];
	$this->db->insert('usuarios',$data);

	$data = [
		'usuario' => 'carla',
		'senha' => password_hash('123',PASSWORD_DEFAULT)
	];
	$this->db->insert('usuarios',$data);
	$this->db->query('ALTER TABLE usuarios AUTO_INCREMENT = 1');
   }
   public function inserirProdutos()
   {
	   $this->db->empty_table('produtos');
	   $data = [
		   ['designacao'=>'CPUS','quantidade'=>10],	
		   ['designacao'=>'Memorias','quantidade'=>10],
		   ['designacao'=>'Chocolates','quantidade'=>10],
		   ['designacao'=>'Camisetas','quantidade'=>10],
	   ];
	   $this->db->query('ALTER TABLE produtos AUTO_INCREMENT = 1');
	   $this->db->insert_batch('produtos',$data);

	   $this->db->empty_table('movimentos');
	   $data=[
		   ['id_produto'=>1,'quantidade'=>10,'data_hora'=>date('Y-m-d H:m:s')],
		   ['id_produto'=>2,'quantidade'=>10,'data_hora'=>date('Y-m-d H:m:s')],
		   ['id_produto'=>3,'quantidade'=>10,'data_hora'=>date('Y-m-d H:m:s')],
		   ['id_produto'=>4,'quantidade'=>10,'data_hora'=>date('Y-m-d H:m:s')]

	   ];
	   $this->db->query('ALTER TABLE movimentos AUTO_INCREMENT = 1');
	   $this->db->insert_batch('movimentos',$data);
   }
}