<?php
class Notfound extends CI_Controller{
	
	function __consctruct(){
		parent::_contruct();
	}

	function index(){
		$this->output->set_status_header('404');
		$this->load->view('v_notfound');
	}
}
?>