<?php

class Reports extends CI_Controller{

	function __construct(){
		parent::__construct();
		//session
		check_session();
		//model
		$this->load->model('m_report');

	}

	function index(){
		$this->template->load('inv_template', 'reports/v_view_report');
	}

	function stockCard(){
		$date1 = $this->input->post('');
		$date2 = $this->input->post('');
		$data['stock'] = $this->m_report->stock_card($date1, $date2);
		$this->template->load('inv_template', 'reports/v_view_stockCard');
	}

	function stockRecap(){
		$this->template->load('inv_template', 'reports/v_view_stockRecap');
	}

	function purchase(){
		$this->template->load('inv_template', 'reports/v_view_rptPurchase');
	}

	function sale(){
		$this->template->load('inv_template', 'reports/v_view_rptSale');
	}

	function opname(){
		$this->template->load('inv_template', 'reports/v_view_rptOpname');
	}

	function account(){
		$this->template->load('inv_template', 'reports/v_view_account');
	}

	function profit(){
		$this->template->load('inv_template', 'reports/v_view_pnl');
	}

	function balance(){
		$this->template->load('inv_template', 'reports/v_view_balance');
	}

}

?>