<?php
class Purchase_add extends CI_Controller{

	function __construct(){
		parent::__construct();
		//check_session();
		//load model
		$this->load->model('m_purchase');

	}	

	function index(){
		$data['purchase'] = $this->m_purchase->get_max()->row_array();
		$data['product'] = $this->m_purchase->get_one_product();
		$this->template->load('inv_template', 'orders/v_add_purchase', $data);
	}

	function add(){
		if(isset($_POST['submit'])){

		}
	}

	function product(){
		$code = $this->input->post('id_product');

		$data = $this->m_purchase->get_val($code)->row_array();

		$json = array(
				'cost'=> $data['product_cost'],
				'price'=> $data['product_price'],
				'id'=> $data['id_product']);
					

		header('Content-Type: application/json');
		echo json_encode($json);
	}
}
?>