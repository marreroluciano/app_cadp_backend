<?php
  class Sign_in extends CI_Controller {
    function __construct(){
      parent::__construct();      
      $this->load->model('user_teacher_model');
      $this->load->library('session');
    }
      
   function index () {
     if (!$this->user_teacher_model->isLogin()) {
       $datos_layout["title"]   = "CADP - Sistema de administraci&oacute;n";
       $datos_layout["content"] = $this->load->view('sign_in_view', '', true);
       $this->load->view('layout_view', $datos_layout);
      } else {
         $datos_layout["title"] = "CADP";
         $datos_layout["user_menu"] = $this->load->view('user/menu_view', '', true);
         $datos_layout["content"] = $this->load->view('user/initial_view', '', true);
         $this->load->view('layout_view', $datos_layout);
      }
   }
}
?> 