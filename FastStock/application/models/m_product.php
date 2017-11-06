<?php
class M_product extends CI_Model{

	function get_all(){
		return $this->db->get('tb_product');
	}

	function get_one($sku){
		$id = array('id_product'=>$sku);
		return $this->db->get_where('tb_product', $id);
	} 

	function get_detail($sku){
		$id = array('id_product'=>$sku);
		return $this->db->get_where('tb_product_detail', $id);
	}


	function post($data){
		$this->db->insert('tb_product', $data);

	}

	function update($sku, $data){
		$this->db->where(array('id_product'=>$sku));
		$this->db->update('tb_product', $data);

	}

	function delete(){
		$this->db->where('id_product', $sku);
		$this->db->delete('tb_product');
		
	}

	function category(){
		return $this->db->get('tb_category');
	}

	function stockin($sku){
		$this->db->select_sum('stock_in_qty');
		$this->db->from('tb_product');
		$this->db->join('tb_stock_in_detail', 'tb_stock_in_detail.id_product = tb_product.id_product');
		$this->db->join('tb_stock_in', 'tb_stock_in.id_stock_in = tb_stock_in_detail.id_stock_in');
		$this->db->where(array('tb_product.id_product'=>$sku, 'tb_stock_in.stock_in_status'=>'Posted'));
		return $this->db->get();
	}

	function stockout($sku){
		$this->db->select_sum('stock_out_qty');
		$this->db->from('tb_product');
		$this->db->join('tb_stock_out_detail', 'tb_stock_out_detail.id_product = tb_product.id_product');
		$this->db->join('tb_stock_out', 'tb_stock_out.id_stock_out = tb_stock_out_detail.id_stock_out');
		$this->db->where(array('tb_product.id_product'=>$sku, 'tb_stock_out.stock_out_status'=>'Posted'));
		return $this->db->get();
	}

	function stockopname($sku){
		//$this->db->select_sum('opname','opname_qty');
		return $this->db->query(
			"
			Select sum(opnd.opname*opnd.counter) as opname_qty
			from tb_stock_opname_detail opnd
			left join
			tb_product p
			ON
			opnd.id_product = p.id_product
			left join
			tb_stock_opname opn
			ON
			opn.id_stock_opname = opnd.id_stock_opname
			where opn.status = 'Posted' and p.id_product = '".$sku."'
			"
			);
		/*$this->db->from('tb_product');
		$this->db->join('tb_stock_opname_detail', 'tb_stock_opname_detail.id_product = tb_product.id_product');
		$this->db->join('tb_stock_opname', 'tb_stock_opname.id_stock_opname = tb_stock_opname_detail.id_stock_opname');
		$this->db->where(array('tb_stock_opname.status'=>'Posted', 'tb_product.id_product'=>$sku));
		return $this->db->get();*/
	}

	function stock_in_all(){
		return $this->db->query(
			"
			SELECT p.*, ins.in_qty, ou.out_qty, opn.opname_qty
				FROM tb_product p
					LEFT JOIN
					(SELECT * FROM stock_in) AS ins
					ON
					p.id_product = ins.id_product
					LEFT JOIN
					(SELECT * FROM stock_out) AS ou
					ON
					p.id_product = ou.id_product
					LEFT JOIN
					(SELECT * FROM stock_opname) as opn
					on
					p.id_product = opn.id_product
			"
			);
	}


	function get_max(){
		$this->db->select_max('id_product');
		$this->db->from('tb_product');
		return $this->db->get();
	}
}
?>