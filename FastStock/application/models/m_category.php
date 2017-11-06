<?php
class M_category extends CI_Model{
	

	function get_all(){
		return $this->db->get('tb_category');
	}

	function get_one($cat){
		return $this->db->get_where('tb_category', array('id_category'=>$cat));
	}

	function get_max(){
		$this->db->select_max('id_category');
		$this->db->from('tb_category');
		return $this->db->get();
	}

	function insert($data){
		$this->db->insert('tb_category', $data);

	}

	function update($code, $data){
		$this->db->where(array('id_category'=>$code));
		$this->db->update('tb_category', $data);
	}

	function delete(){

	}	


}
?>