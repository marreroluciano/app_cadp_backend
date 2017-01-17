<?php
  class User_teacher_model extends CI_Model{
      
    function __construct(){
      parent::__construct();      
      $this->load->library('encrypt');
      $this->load->library('session');
    }

    /* verifica si hay una sesión iniciada */
    function isLogin() {     
      return (isset($this->session->userdata['user']));
    }

    /* obtiene el usuario con el nombre de usuario recibido */
    function get_user_username($user_name){
      $this->db->where('user',$user_name);
      $query = $this->db->get('user_teacher');
      return($query->result());
    }

    
}
?> 