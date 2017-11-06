<?php
class Purchase extends CI_Controller{

	function __construct(){
		parent::__construct();
		//check session data
		check_session();
		//load model
		$this->load->model('m_purchase');
		$this->load->library('form_validation');

	}

	function index(){
		$data['purchase'] = $this->m_purchase->get_all();
		$this->template->load('inv_template', 'orders/v_purchase', $data);
	}

	function add(){
		
		if(isset($_POST['submit'])){
			//posting on table detail
			/*$this->form_validation->set_rules('product_name[]', 'Product', 'trims|required');
			$this->form_validation->set_rules('product_cost[]', 'Cost', 'trims|required');
			$this->form_validation->set_rules('product_qty[]', 'Quantity', 'trims|required');
			$this->form_validation->set_rules('sub_total[]', 'Subtotal', 'required');
			$this->form_validation->set_rules('total[]', 'Total', 'required');
			$this->form_validation->set_rules('po_number', 'Purchase Number', 'required');
			$this->form_validation->set_rules('po_date', 'Purchase Date', 'required');
			$this->form_validation->set_rules('po_remark', 'Purchase Remark', 'required');
			$this->form_validation->set_rules('po_sub_total', 'Purchase Subtotal', 'required');

			if($this->form_validation->run() == false){
				$dataError = array (
									'status' => false,	
									'message' => 'Please Complete The Form'
									);
				echo json_encode($dataError);

			}
			else{
				$pro_name = $this->input->post('product_name[]');
				$pro_cat = $this->input->post('product_category[]');
				$pro_cost = $this->input->post('product_cost[]');
				$pro_qty = $this->input->post('product_qty[]');
				$pro_unit = $this->input->post('product_unit[]');
				$pro_subtotal = $this->input->post('sub_total[]');
				$pro_disc = $this->input->post('product_disc[]');
				$pro_tax = $this->input->post('tax[]');
				$pro_total = $this->input->post('total[]');

				//posting on table master
				$po_number = $this->input->post('po_number');
				$po_date = $this->input->post('po_date');
				$po_supplier = $this->input->post('po_supplier');
				$po_delivery = $this->input->post('po_delivery');
				$po_payment = $this->input->post('po_payment');
				$po_remark = $this->input->post('po_remark');
				$po_notes = $this->input->post('po_note');
				$po_subtotal = $this->input->post('po_sub_total');
				$po_tax = $this->input->post('po_tax');
				$po_disc = $this->input->post('po_disc');
				$po_delv = $this->input->post('po_delv');
				$po_grandtotal = $this->input->post('po_grandtotal');


				$data_stock = array(
								'id_stock_in'=> $po_number,
								'trans_stock_in'=> $po_date,
								'remark_stock_in'=> $po_remark,
								'tax'=> $po_tax,
								'disc'=> $po_disc,
								'stock_in_status'=> 'Posted',
								'record_by'=> 'Admin',
								'record_time'=> now(),
								'stock_in_notes'=> $po_notes,
								'supplier'=> $po_supplier,
								'payment'=> $po_payment,
								'delivery_status'=> $po_delivery,
								'delivery_cost'=> $po_delv
					);


				
				$this->m_purchase->insert_stock($data_stock);


				$countData = count($pro_name);
				for($x=0; $x<$countData; $x++){
					$data = array(
								'id_stock_detin'=> '',
								'id_stock_in'=> $po_number,
								'id_product'=> $pro_name[$x],
								'stock_cost'=> $pro_cost[$x],
								'id_size'=> '',
								'stock_in_qty'=> $pro_qty[$x],
								'stock_in_subtotal'=> $pro_subtotal[$x],
								'stock_in_tax'=> $pro_tax[$x],
								'stock_in_disc'=> $pro_disc[$x],
								'stock_in_detstatus'=> 'posted',
								'stock_in_total'=> $pro_total[$x]
					);

					$this->m_purchase->insert_stock_detail($data);	
				}*/

				$po_number = $this->input->post('id_purchase');

				$data = array('id_stock_in' => $po_number);

				$this->m_purchase->coba_insert($data);

				redirect('purchase');
			//}	//end form validation condittion			

		}
		else if(isset($_POST['draft'])){

		}
		else{
			$data['purchase'] = $this->m_purchase->get_max()->row_array();
			$data['product'] = $this->m_purchase->get_one_product();
			$data['payment'] = $this->m_purchase->get_payment();
			$this->template->load('inv_template', 'orders/v_add_purchase', $data);

			
		}
	}

	function edit(){
		if(isset($_POST['submit'])){

		}
		else{
			$id = $this->uri->segement(3);
			$data['purchase'] = $this->m_purchase->get_one($id)->row_array();
			$data['detail'] = $this->m_purchase->get_detail($id);
			$this->template->load('inv_template', 'orders/v_edit_purchase', $data);
		}
	}

	function delete(){
		$id = $this->uri->segment(3);

		$this->m_purchase->delete($id);
		redirect('purchase');
	}

	function product(){
		$code = $this->input->post('id_product', TRUE);

		$data = $this->m_purchase->get_product($code)->row_array();

		$json = array(
				'cost' => $data['product_cost'],
				'price'=> $data['product_price'],
				'category'=> $data['product_category'],
				'id'=> $data['id_product']);
					

		//header("Content-Type: application/json; charset=utf-8", true);
		echo json_encode($json);
	}

	function option(){
		$i = $this->input->post('is');
		$data['i'] = $i;
		$data['product'] = $this->m_purchase->get_one_product();
		$this->load->view('orders/v_option', $data);

	}

	function coba(){

		$this->form_validation->set_rules('id_purchase', 'Purchase Number', 'required');
			$this->form_validation->set_rules('po_date', 'Purchase Number', 'required');
			$this->form_validation->set_rules('po_supplier', 'Purchase Number', 'required');
			$this->form_validation->set_rules('po_remark', 'Purchase Number', 'required');
			$this->form_validation->set_rules('po_delivery', 'Purchase Number', 'required');
			$this->form_validation->set_rules('po_payment', 'Purchase Number', 'required');

		if($this->form_validation->run() == false){
			$dataError = array(
					'status' => false,
					'message' => 'Please Complate Purchase Order'
				);

			echo json_encode($dataError);
		}
		else{
			$po_number = $this->input->post('id_purchase');
			$po_date = $this->input->post('po_date');
			$po_remark = $this->input->post('po_remark');
			$po_supplier = $this->input->post('po_supplier');


			$dataInputStockIn = array(
					'id_stock_in' => $po_number,
					'trans_stock_in' => $po_date
				);

			$this->m_purchase->insert_stock($dataInputStockIn);

			$product_name = $this->input->post('id_product');

			$countData = count($product_name);

			for($x=0; $x<$countData; $x++){
				$dataInputStockInDet = array(
					'id_stock_detin' => '',
					'id_stock_in' => $po_number,
					'id_product' => $product_name[$x]
					);

				$this->m_purchase->insert_stock_detail($dataInputStockInDet);
			}

			$dataError = array('status' => true, 'message' => 'Complete');

			echo json_encode($dataError);
		}	
		
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
								'id_stock_in' => $po_number,
								'trans_stock_in' => $po_date,
								'remark_stock_in' => $po_remark,
								'supplier' => $po_supplier,
								'delivery_status' => $po_delv,
								'payment' => $po_pay,
								'total_cost' => $po_total,
								'tax' => $po_tax,	
								'disc' => $po_disc,
								'delivery_cost' => $po_delv_cost,
								'stock_in_notes' => $po_notes,
								'stock_in_status' => 'Posted',
								'record_by' => $username


					);

				$this->m_purchase->insert_stock($dataInputStockIn);

				$countProduct = count($id_product);

				for($x = 0; $x < $countProduct; $x++){
					$dataInputStockInDet = array(
								'id_stock_detin' => '',
								'id_stock_in' => $po_number,
								'id_product' => $id_product[$x],
								'stock_cost' => $stock_cost[$x],
								'id_size' => '',
								'stock_in_qty' => $stock_in_qty[$x],
								'stock_in_tax' => $stock_in_tax[$x],
								'stock_in_disc' => $stock_in_disc[$x],
								'stock_in_detstatus' => 'Posted'

						);

					$this->m_purchase->insert_stock_detail($dataInputStockInDet);
				}

				$id_stock_in = $this->input->post('id_purchase');
				$this->m_purchase->insrt_and_CallProcedure($id_stock_in);

				$dataSuccess = array(
							'status' => true,
							'message' => 'Purchase Order Success'
					);


				echo json_encode($dataSuccess);

			}
				
		} // end if submit

	} //end function add insert


	/* Function for view pucrhase detail */

	function view(){
		$purchase_number = $this->uri->segment(3);

		$data['purchase'] = $this->m_purchase->get_one($purchase_number)->row_array();
		$data['purchdetail'] = $this->m_purchase->get_detail($purchase_number);

		$this->template->load('inv_template', 'orders/v_view_purchase', $data);
	}

}
?>
