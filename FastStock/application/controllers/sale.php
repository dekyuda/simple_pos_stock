<?php
class Sale extends CI_COntroller{

	function __construct(){
		parent::__construct();

		check_Session();
		//load model
		$this->load->model('m_sale');
		//load validation
		$this->load->library('form_validation');
	}

	function index(){
		$data['sale'] = $this->m_sale->get_all();
		$this->template->load('inv_template', 'orders/v_sale', $data);
	}

	function add(){
		$data['purchase'] = $this->m_sale->get_max()->row_array();
		$data['product'] = $this->m_sale->get_one_product();
		$data['payment'] = $this->m_sale->get_payment();
		$this->template->load('inv_template', 'orders/v_add_sale', $data);
	}

	function option(){
		$i = $this->input->post('is');
		$data['i'] = $i;
		$data['product'] = $this->m_sale->get_one_product();
		$this->load->view('orders/v_option', $data);

	}


	function addInsert(){
		$isset = $this->input->post('issetType');

		if($isset == 'submit'){
			//For Purchase || Stock In 
			$this->form_validation->set_rules('id_purchase', 'Purchase Number', 'required');
			$this->form_validation->set_rules('po_date', 'Trans Date', 'required');
			$this->form_validation->set_rules('po_supplier', 'Supplier Number', 'required');
			$this->form_validation->set_rules('po_remark', 'Remark', 'required');
			$this->form_validation->set_rules('po_delivery', 'Delivery', 'required');
			$this->form_validation->set_rules('po_payment', 'Payment', 'required');

			//For Purchase Details || Stock In Detail
			//$this->form_validation->set_rules('id_product', 'Product', 'required');
			//$this->form_validation->set_rules('product_cost', 'Cost', 'required');
			//$this->form_validation->set_rules('product_qty', 'Quantity', 'required');

			if($this->form_validation->run() == false){
				$dataError = array(
									'status' => false,
									'message' => 'Please Complete The form'
									/*array(
											form_error('id_purchase'),
											form_error('po_date'),
											form_error('po_supplier'),
											form_error('po_remark'),
											form_error('po_delivery'),
											form_error('po_payment')*/
										//)
					);

				echo json_encode($dataError);
			}
			else{
				$po_number = $this->input->post('id_purchase');
				$po_date = $this->input->post('po_date');
				$po_remark = $this->input->post('po_remark');
				$po_supplier = $this->input->post('po_supplier');
				$po_delv = $this->input->post('po_delivery');
				$po_pay = $this->input->post('po_payment');
				$po_total = $this->input->post('po_total');
				$po_tax = $this->input->post('po_tax');
				$po_disc = $this->input->post('po_disc');
				$po_delv_cost = $this->input->post('po_delv_cost');
				$po_notes = $this->input->post('po_notes'); 

				//For Product
				$id_product = $this->input->post('id_product');
				$stock_cost = $this->input->post('product_cost');
				$stock_in_qty = $this->input->post('product_qty');
				$stock_in_tax = $this->input->post('product_tax');
				$stock_in_disc = $this->input->post('product_disc');

				$username = $this->session->userdata('username');

				//echo $po_number." ".$po_date;
				$dataInputStockIn = array(
								'id_stock_out' => $po_number,
								'trans_stock_out' => $po_date,
								'remark_stock_out' => $po_remark,
								'custommer' => $po_supplier,
								'delivery_status' => $po_delv,
								'payment' => $po_pay,
								'total_price' => $po_total,
								'tax' => $po_tax,	
								'disc' => $po_disc,
								'delivery_cost' => $po_delv_cost,
								'stock_out_notes' => $po_notes,
								'stock_out_status' => 'Posted',
								'record_by' => $username


					);

				$this->m_sale->insert_stock($dataInputStockIn);

				$countProduct = count($id_product);

				for($x = 0; $x < $countProduct; $x++){
					$dataInputStockInDet = array(
								'id_stock_detout' => '',
								'id_stock_out' => $po_number,
								'id_product' => $id_product[$x],
								'stock_price' => $stock_cost[$x],
								'id_size' => '',
								'stock_out_qty' => $stock_in_qty[$x],
								'stock_out_tax' => $stock_in_tax[$x],
								'stock_out_disc' => $stock_in_disc[$x],
								'stock_out_detstatus' => 'Posted'

						);

					$this->m_sale->insert_stock_detail($dataInputStockInDet);
				}

				$id_stock_in = $this->input->post('id_purchase');
				$this->m_sale->insrt_and_CallProcedure($id_stock_in);

				$dataSuccess = array(
							'status' => true,
							'message' => 'Sale Order Success'
					);


				echo json_encode($dataSuccess);
			}
				
		} // end if submit

	} //end function add insert


	function view(){
		$sale_number = $this->uri->segment(3);

		$data['purchase'] = $this->m_sale->get_one($sale_number)->row_array();
		$data['purchdetail'] = $this->m_sale->get_detail($sale_number);

		$this->template->load('inv_template', 'orders/v_view_sale', $data);
	}

	function product(){
		$code = $this->input->post('id_product', TRUE);

		$data = $this->m_sale->get_product($code)->row_array();

		$json = array(
				'cost' => $data['product_cost'],
				'price'=> $data['product_price'],
				'category'=> $data['product_category'],
				'id'=> $data['id_product']);
					

		//header("Content-Type: application/json; charset=utf-8", true);
		echo json_encode($json);
	}

}
?>