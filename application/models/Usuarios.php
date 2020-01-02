<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Model {

	public function verificaLogin($user)
	{
		$result=$this->db->from('usuarios')->where('usuario', $user)->get()->result_array();
		if ($result) {
			return $result;
		} else {
			return false;
		}	
	}
}