<?php
class Category extends CI_Controller{

	function __construct(){
		parent::__construct();
		check_session();
		$this->load->model('m_category');
	}

	function index(){
		$data['category'] = $this->m_category->get_all();
		$this->template->load('inv_template', 'product/v_category', $data);
	}

	function add(){
		if(isset($_POST['submit'])){
			$code = $this->input->post('category_id');
			$name = $this->input->post('category_name');
			$desc = $this->input->post('category_desc');

			$data = array(
						'id_category'=>$code,
						'category_name'=>$name,
						'category_desc'=>$desc
				);
			
			$this->m_category->insert($data);
			redirect('category');		
		}
		else{
			$data['cat'] = $this->m_category->get_max()->row_array();
			$this->template->load('inv_template', 'product/v_add_category', $data);
		}
		


	}	


	function edit(){
		if(isset($_POST['submit'])){
			$code = $this->input->post('category_id');
			$name = $this->input->post('category_name');
			$desc = $this->input->post('category_desc');

			$data = array(
						'category_name'=>$name,
						'category_desc'=>$desc
				);

			$this->m_category->update($code, $data);
			redirect('category');

		}
		else{
			$cat = $this->uri->segment(3);
			$data['category'] = $this->m_category->get_one($cat)->row_array();	

			$this->template->load('inv_template', 'product/v_edit_category', $data);
		}
		
	}

	function delete(){
		$del = $this->uri->segment(3);

		if($del){

		}
		else{
			//message error with JSON
		}
	}
}
?>