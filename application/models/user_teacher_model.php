<?php
  class User_teacher_model extends CI_Model{
      
    function __construct(){
      parent::__construct();      
      $this->load->library('encrypt');
      $this->load->library('session');
    }

    /* verifica si hay una sesión iniciada */
    public function isLogin() {     
      return (isset($this->session->userdata['user']));
    }

    
}
?> 