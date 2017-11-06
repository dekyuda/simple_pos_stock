<?php
class M_Purchase extends CI_Model{
	
	//manampilkan stockin pada halamn purchase
	function get_all(){
		return $this->db->get('tb_stock_in');
	}

	//manampilkan stockin dan detail dari stock in kedalam view deatil purchase by id_stock_in 
	function get_one($id){
		return $this->db->get_where('tb_stock_in', array('id_stock_in'=>$id));

	}

	function get_detail($id){
		$this->db->select('*');
		$this->db->from('tb_stock_in_detail');
		$this->db->join('tb_product', 'tb_stock_in_detail.id_product = tb_product.id_product');
		$this->db->where(array('id_stock_in' => $id));
		return $this->db->get();
	}


	//mengambil nilai paling tinggi dari row id_stock_in agar dapat mengurutkan ketika membuat purchase order yang baru
	function get_max(){
		$this->db->select_max('id_stock_in');
		$this->db->from('tb_stock_in');
		return $this->db->get();
	}

	//mengambil product code dari ajax pada view dan controller
	function get_product($code){
		return $this->db->get_where('tb_product', array('id_product'=>$code));
	}

	//mengambil product dan menampilkan pada add purchase
	//dan status for buy active
	function get_one_product(){
		return $this->db->get_where('tb_product', array('product_status'=>'active'));
	}

	function get_payment(){
		return $this->db->get('tb_payment');
	}

	
	/*Insert Stock In*/
	function insert_stock($dataInputStockIn){
		$this->db->insert('tb_stock_in', $dataInputStockIn);
	}

	function insrt_and_callProcedure($id_stock_in){
		$this->db->query("CALL stock_in_total_updt('".$id_stock_in."')");
	}

	/*Insert Stock In Detail*/
	function insert_stock_detail($dataInputStockInDet){
		$this->db->insert('tb_stock_in_detail', $dataInputStockInDet);
	}

	function update_stock(){

	}

	function delete_stock($id){
		$this->db->where(array('id_stock_in'=>$id));
		$this->db->delete('tb_stock_in');
		$this->db->delete('tb_stock_in_detail');
	}

	function get_val($code){
		return $this->db->get_where('tb_product', array('id_product'=>$code));
	}

	function coba_insert($data){
		$this->db->insert('tb_stock_in', $data);
	}

		
}
?>