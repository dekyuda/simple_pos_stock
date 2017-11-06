<?php
class Product extends CI_Controller{

	function __construct(){
		parent::__construct();
		check_session();
		$this->load->model('m_product');
	}

	function index(){

		$data['record'] = $this->m_product->get_all();
		$data['stock'] = $this->m_product->stock_in_all();
		$this->template->load('inv_template', 'product/v_product', $data);
	}

	function edit(){
		if(isset($_POST['submit'])){
			//$sku = $this->uri->segment(3); tidak bisa menggunakan segment
			$sku = $this->input->post('product_id');
			$name = $this->input->post('product_name');
			$category = $this->input->post('product_category');
			$desc = $this->input->post('product_desc');
			$cost = $this->input->post('product_cost');
			$price = $this->input->post('product_price');

			$data = array(
							'product_name'=>$name,
							'product_category'=>$category,
							'product_desc'=>$desc,
							'product_cost'=>$cost,
							'product_price'=>$price
						);

			$this->m_product->update($sku, $data);
			redirect('product');

		}
		else{
			$sku = $this->uri->segment(3);
			$data['record'] = $this->m_product->get_one($sku)->row_array();
			$data['detail'] = $this->m_product->get_detail($sku)->row_array();
			$data['category'] = $this->m_product->category()->result();
			$data['stockin'] = $this->m_product->stockin($sku)->row_array();
			$data['stockout'] = $this->m_product->stockout($sku)->row_array();
			$data['stockopname'] = $this->m_product->stockopname($sku)->row_array();
			$this->template->load('inv_template', 'product/v_edit_product', $data);
		}
	}


	function add(){
		if(isset($_POST['submit'])){
			$sku = $this->input->post('product_id');
			$name = $this->input->post('product_name');
			$category = $this->input->post('product_category');
			$desc = $this->input->post('product_desc');
			$cost = $this->input->post('product_cost');
			$price = $this->input->post('product_price');

			$data = array(
						'id_product'=>$sku,
						'product_name'=>$name,
						'product_category'=>$category,
						'product_cost'=>$cost,
						'product_price'=>$price,
						'product_desc'=>$desc,
						'id_unit'=>1,
						'product_status'=>'Active'
						//record_by
				);
			$this->m_product->post($data);
			redirect('product');
		}
		else{
			$data['category'] = $this->m_product->category()->result();
			$data['product']= $this->m_product->get_max()->row_array();		

			$this->template->load('inv_template', 'product/v_add_product', $data);
		}

	}


	function delete(){
		$sku = $this->uri->segment(3);
		$this->m_product->delete($sku);

	}
}
?>