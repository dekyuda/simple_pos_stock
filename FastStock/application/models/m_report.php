<?php
class M_Report extends CI_Model{

	/* Report Stock*/
	function stock_card($date1, $date2){
	return $this->db->query("
			SELECT FROM tb_product p
			LEFT JOIN
			(SELECT SUM(in_qty) as in_qty FROM stock_in_new WHERE trans_stock_in BETWEEN '".$date1."' AND '".$date2."' GROUP BY id_product) i
			ON
			p.id_product = i.id_product
			GROUP BY p.id_product
			");
	}


	/* Report Purchase and Sale */



	/* Report Account and Payment */


	/* Report PNL and Balance */

}
?>