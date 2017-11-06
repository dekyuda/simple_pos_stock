<?php

  function check_session(){
    $CI = & get_instance();
    $session = $CI->session->userdata('status_login');

    if($session != 'login'){
      redirect('login');
    }
  }

  function check_session_login(){
    $CI = & get_instance();
    $session = $CI->session->userdata('status_login');

    if($session == 'login'){
      redirect('main');
    }
  }

  function add_session(){
    $CI = & get_instance();
    $session = $CI->session->userdata('status_login');

    if($session == 'login'){
      $username = $CI->session->userdata('username');
      $autority = $CI->session->userdata('level_login');

    }
  }

 ?>
