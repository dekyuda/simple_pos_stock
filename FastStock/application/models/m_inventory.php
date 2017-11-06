<?php
class M_Inventory extends CI_Model{

	function get_opname(){
		return $this->db->get('tb_stock_opname');
	}

	function get_opname_detail($id){
		$this->db->select('*');
		$this->db->from('tb_stock_opname_detail');
		$this->db->join('tb_product', 'tb_stock_opname_detail.id_product = tb_product.id_product');
		$this->db->where(array('id_stock_opname' => $id));
		return $this->db->get();
	}

	function get_opname_one($id){
		return $this->db->get_where('tb_stock_opname', array('id_stock_opname' => $id));
	}

	function get_product(){

	}	

	function get_max(){
		$this->db->select_max('id_stock_opname');
		$this->db->from('tb_stock_opname');
		return $this->db->get();
	}

	function get_cat(){
		return $this->db->get('tb_Category');
	}

	function stockin($date){
		/* Query 1 */
	return $this->db->query("
		SELECT p.id_product, p.product_name, p.product_category, i.in_qty, o.out_qty, n.op_qty FROM tb_product p
			LEFT JOIN
			(SELECT id_product, SUM(in_qty) AS in_qty FROM stock_in_new WHERE trans_stock_in <= '".$date."' GROUP BY id_product) i
			ON 
			p.id_product = i.id_product
			LEFT JOIN
			(SELECT id_product, SUM(out_qty) AS out_qty FROM stock_out_new WHERE trans_stock_out <= '".$date."' GROUP BY id_product) o
			ON
			p.id_product = o.id_product
			LEFT JOIN
			(SELECT id_product, SUM(opname_qty*counter) AS op_qty FROM stock_opname_new WHERE opname_date <= '".$date."' GROUP BY id_product) n
			ON
			p.id_product = n.id_product
			ORDER BY p.id_product
			");
	}

	function stockincat($date, $type){
		return $this->db->query("
				SELECT p.id_product, p.product_name, p.product_category, i.in_qty, o.out_qty, n.op_qty FROM tb_product p
					LEFT JOIN
					(SELECT id_product, SUM(in_qty) AS in_qty FROM stock_in_new WHERE trans_stock_in <= '".$date."' GROUP BY id_product) i
					ON 
					p.id_product = i.id_product
					LEFT JOIN
					(SELECT id_product, SUM(out_qty) AS out_qty FROM stock_out_new WHERE trans_stock_out <= '".$date."' GROUP BY id_product) o
					ON
					p.id_product = o.id_product
					LEFT JOIN
					(SELECT id_product, SUM(opname_qty*counter) AS op_qty FROM stock_opname_new WHERE opname_date <= '".$date."' GROUP BY id_product) n
					ON
					p.id_product = n.id_product
					WHERE p.product_category = '".$type."'
					ORDER BY p.id_product
			");
	}

	function insertopname($data){
		$this->db->insert('tb_stock_opname', $data);
	}

	function insertopnamedetail($dataDetail){
		$this->db->insert('tb_stock_opname_detail', $dataDetail);
	}
}
?>