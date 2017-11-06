<?php
class Pos extends CI_Controller{

	function __construct(){
		parent::__construct();

		//load model
		$this->load->model('m_pos');
	}

	function index(){
		$data['category'] = $this->m_pos->get_Category();
		$data['product'] = $this->m_pos->get_product();
		$data['id_order'] = $this->m_pos->get_max()->row_array();
 		$this->load->view('pos_template', $data);
	}

	function add(){
		$input = $this->input->post('id');

		$product = $this->m_pos->get_product_detail($input)->row_array();

		$data = array(
				'product_name' => $product['product_name'],
				'product_price' => $product['product_price']
			);

		echo json_encode($data);

		/* for database
		$id_product = $this->input->post('id_product');
		$det_order = $this->input->post('order_det');
		$id_order = $this->input->post('id_order'); 

		$input = array(
				'id_order_det' => $det_order,
				'id_order' => $id_order,
				'id_product' => $id_product
			);

		$insert = $this->m_pos->add_nota($data);
		$product = $this->m_pos->get_product_detail($input)->row_array();
		$data = array(
				'product_name' => $product['product_name'],
				'product_price' => $product['product_price']
			);

		echo json_encode($data);
		*/
	}

	function byCategory(){
		$data = $this->input->post('id');

		$value = $this->m_pos->byCategory($data);
		$display = array();

		foreach($value->result() as $val){
			$display[] = array(
					'id_product' => $val->id_product,
					'product_name' => $val->product_name,
					'product_category' => $val->product_category,
					'product_price' => $val->product_price
				);
		}

		echo json_encode($display);
	}
}
?>