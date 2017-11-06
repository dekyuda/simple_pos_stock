<?php
class Main extends CI_Controller{

  function __construct(){
    parent::__construct();
    //load Model dasboard
    $this->load->model('m_dashboard');
    //check session on helper
    check_session();
  }

  function index(){
    //$this->load->view('dashboard');
    //$this->load->view('inv_template');

    /* Hide for K3 
    $data['product'] = $this->m_dashboard->get_data();
    $data['sales'] = $this->m_dashboard->get_sale();
    $data['customer'] = $this->m_dashboard->get_cust();
    $data['top_product'] = $this->m_dashboard->get_top_sale();
    $this->template->load('inv_template', 'dashboard', $data); */

    $this->load->view('v_main');
  }


  //belum dipakai

  function main(){
    $data['product'] = $this->m_dashboard->get_data();
    $data['sales'] = $this->m_dashboard->get_sale();
    $this->template->load('template', 'dashboard', $data);
  }
}
?>
