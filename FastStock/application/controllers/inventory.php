<?php

class Inventory extends CI_Controller{

	function __construct(){
		parent::__construct();

		check_session();
		//load model
		$this->load->model('m_inventory');
		//load form validation
		$this->load->library('form_validation');
	}

	function index(){
		$data['opname'] = $this->m_inventory->get_opname();
		$this->template->load('inv_template', 'inventory/v_stock_opname', $data);
	}

	function add(){
		//add opname
		$data['opname'] = $this->m_inventory->get_max()->row_array();
		$data['category'] = $this->m_inventory->get_cat();

		$this->template->load('inv_template', 'inventory/v_add_stockopname', $data);
	}

	function addNew(){
		$this->form_validation->set_rules('date', 'Opname Date', 'required');

		if($this->form_validation->run() == false){			
			echo "<h2 class='error-message'><b>Please Select Opname Date</b></h2>";
		}
		else{
			$date = $this->input->post('date');
		
			$data['stock'] = $this->m_inventory->stockin($date);
		
			
			$this->load->view('inventory/inv_opname', $data);
		}
		
	}

	function addNewCat(){
		$this->form_validation->set_rules('date', 'Date is Required', 'required');

		if($this->form_validation->run() == false){
			echo "<h2 class='error-message'><b>Please Select Opname Date</b><h2>";
		}
		else{
			$date = $this->input->post('date');
			$type = $this->input->post('type');

			$data['stock'] = $this->m_inventory->stockincat($date, $type);

			$this->load->view('inventory/inv_opname', $data);
		}
		
	}

	function view(){
		//view opname detail
		$id = $this->uri->segment(3);
		$data['opname'] = $this->m_inventory->get_opname_one($id)->row_array();
		$data['opnameDetail'] = $this->m_inventory->get_opname_detail($id);

		$this->template->load('inv_template', 'inventory/v_view_stockopname', $data);
	}

	function product(){
		//on list product
	}

	function insertopname(){
		$this->form_validation->set_rules('id', 'ID Required', 'required');
		$this->form_validation->set_rules('date', 'Date is required', 'required');
		//$this->form_validation->set_rules('sys_qty', 'System Quantity is Required', 'required');
		//$this->form_validation->set_rules('rel_qty');

		if($this->form_validation->run() == false){
			$error = array(
							'status' => false,
							'message' => 'Please Complete Form'
				);

			echo json_encode($error);
		}
		else{
			$id = $this->input->post('id');
			$date = $this->input->post('date');
			$remark = $this->input->post('remark');
			$type = $this->input->post('type');
			$typeDet = $this->input->post('typeDetail');
			$username = $this->session->userdata('username');

			$data = array(
					'id_stock_opname' => $id,
					'opname_date' => $date,
					'remark' => $remark,
					'type' => $type,
					'type_detail' => $typeDet,
					'status' => 'Posted',
					'record_by' => $username

				);

			$this->m_inventory->insertopname($data);

			// Input Opname Detai || Product
			$id_product = $this->input->post('id_product');
			$sys_qty = $this->input->post('sys_qty');
			$real_qty = $this->input->post('real_qty');
			$desc = $this->input->post('desc');

			$countProduct = count($id_product);

			for($x = 0; $x < $countProduct; $x++){
				$dataDetail = array(
					'id_opname_detail' => '',
					'id_stock_opname' => $id,
					'id_product' => $id_product[$x],
					'stock_system' => $sys_qty[$x],
					'stock_real' => $real_qty[$x],
					'description' => $desc[$x]

				);

				$this->m_inventory->insertopnamedetail($dataDetail);
			}

			$success = array(
					'status' => true,
					'message' => 'Opname Was Success to Posting'
				);

			echo json_encode($success);
			
		} //else

	}

	
}

?>