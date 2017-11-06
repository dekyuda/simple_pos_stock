<?php
class M_pos extends CI_Model{

	function get_product(){
		return $this->db->get('tb_product');
	}

	function get_category(){
		return $this->db->get('tb_category');
	}

	function get_product_detail($input){
		return $this->db->get_where('tb_product', array('id_product'=>$input));
	}

	function get_max(){
		$this->db->select_max('id_order');
		$this->db->from('tb_pos_order');
		return $this->db->get();
	}

	function add_nota($input){
		$this->db->query("");

		//query for select//
		/*SELECT * FROM tb_pos_order_detail_temp WHERE id_order = 'ODR-0001' ORDER BY id_order_det DESC LIMIT 1 */
	}

	function byCategory($data){
		return $this->db->get_where('tb_product', array('product_category' => $data));
	}
}
?>