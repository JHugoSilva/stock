<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Model {

    public function getAll(){
        return $this->db->get('produtos')->result_array();
    }
    public function getProdutoId($id){
        return $this->db->from('produtos')->where('id',$id)->get()->result_array();
    }
    public function editProduto($id){
        $designacao = $this->input->post('txt_designacao');
        $result = $this->db->from('produtos')->where('id',$id)->where('designacao',$designacao)->get();

        if ($result->num_rows()!=0) {
            return [
                'result' => false,
                'msg' => 'Já existe produto cadastrado'
            ];
        } else {
            $this->db->set('designacao',$designacao)->where('id',$id)->update('produtos');
            return [
                'result' => true,
                'msg' => ''
            ];
        }    
    }
    public function insert(){
        $designacao = $this->input->post('txt_designacao');
        $result = $this->db->from('produtos')->where('designacao',$designacao)->get();
        if ($result->num_rows()!=0) {
            return [
                'result' => false,
                'msg' => 'Já existe produto cadastrado'
            ];
        } else {
            $data = ['designacao'=>$designacao,'quantidade'=>0];
            $this->db->insert('produtos', $data);
            return [
                'result' => true,
                'msg' => ''
            ];
        } 
    }
    public function delete($id){
        $this->db->delete('produtos',['id'=>$id]);
    }
    public function alterarQtd($id, $qtd){
        $this->db->where('id', $id)
        ->set('quantidade','quantidade + '.$qtd, false)
        ->update('produtos');

        $params = [
            'id_produto' => $id,
            'quantidade' => $qtd,
            'data_hora' => date('Y-m-d H:s:i')
        ];

        $this->db->insert('movimentos',$params);
    }
    public function movimentos(){
        $result = $this->db->select('m.*, p.designacao as des, p.quantidade as q')
        ->from('movimentos as m')->join('produtos as p','m.id_produto=p.id','left')->get();
        return $result->result_array();
    }
    public function clearMov(){
        $this->db->empty_table('movimentos');
        $this->db->query('ALTER TABLE movimentos AUTO_INCREMENT = 1');
    }
}