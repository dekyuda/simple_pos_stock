<?php
class M_dashboard extends CI_Model{

  function get_data(){
    return $this->db->count_all('tb_product');
  }

  function get_sale(){
  	return $this->db->query("SELECT sum(out_qty) as sale FROM stock_out");
  }

  function get_cust(){
  	return $this->db->count_all('tb_cust');
  }

  function get_top_sale(){
  	return $this->db->query('
  			SELECT p.*, ou.out_qty FROM tb_product p
			LEFT JOIN
			(SELECT * FROM stock_out) AS ou
			ON
			p.id_product = ou.id_product
      WHERE ou.out_qty > 0
			ORDER BY ou.out_qty DESC
      LIMIT 3;
  		'
  		);
  }

}
?>
