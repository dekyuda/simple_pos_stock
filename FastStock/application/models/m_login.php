<?php
class M_login extends CI_Model{

	function check($username, $password){
		return $this->db->get_where('tb_user', array('user_name'=>$username, 'user_password'=>md5($password)));
	}

}
?>