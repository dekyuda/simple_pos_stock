<?php
class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->load->library('form_validation');
	}

	function index(){
		check_session_login();
		$this->load->view('v_login');
	}
	

	function login(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() == FALSE){
			$data = array(
					'message' => array(
						form_error('username'),
						form_error('password')
						),
					'success' => false
				);
			//$this->output->set_content_type('application/json');
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$check = $this->m_login->check($username, $password);

			if($check->num_rows() == 1){
				foreach($check->result() as $c){
					$sess['username'] = $c->user_name;
					$sess['level_login'] = $c->user_autority;
					$sess['status_login'] = 'login';
				
					$this->session->set_userdata($sess);
				}

				$data = array('success' => true, 'redirect' => base_url('main'), 'message' => 'Login Success');
				echo json_encode($data);
				//redirect('main');
				//final into menu			
			}
			else{
			$data = array('message'=>'Username or Password Invalid!');
			echo json_encode($data);	
			//redirect('login');
			}
		}		

	}


	function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('status_login');
		$this->session->unset_userdata('level_login');
		session_destroy();
		$data = array('success'=>false);
		echo json_encode($data);
		redirect('login');
	}
}

?>