<?php
  class Sign_in extends CI_Controller {
    function __construct(){      
      parent::__construct();      
      $this->load->model('user_teacher_model');
      $this->load->model('teacher_model');
      $this->load->library('session');
    }
      
   function index () {
     if (!$this->user_teacher_model->isLogin()) {
       $data_layout["title"]   = "CADP - Sistema de administraci&oacute;n";
       $data_layout["content"] = $this->load->view('sign_in/sign_in_view', '', true);
       $this->load->view('layout_view', $data_layout);
      } else {
         $teacher = $this->teacher_model->get_teacher($this->session->userdata['teacher_id']);
         $data_view['teacher'] = $teacher;

         $data_layout["title"] = "CADP - Sistema de administraci&oacute;n";
         $data_layout["user_menu"] = $this->load->view('user/menu_view', '', true);
         $data_layout["content"] = $this->load->view('user/user_initial_view', $data_view, true);
         $this->load->view('layout_view', $data_layout);
      }
   }

   function sign_in() {
     if (empty($_POST ) != true) {       
       $user_name = $this->input->post('user_name');
       $user_pass = $this->input->post('user_pass');
       $user = $this->user_teacher_model->get_user_username($user_name);

       if ((sizeof($user) > 0) && ($this->encrypt->decode($user[0]->pass) == $user_pass)) {

         $teacher = $this->teacher_model->get_teacher($user[0]->id);
         $data_session = array('user' => $user[0]->user, 'teacher_id' => $user[0]->teacher_id);
         $this->session->set_userdata($data_session);

         $data_view['teacher'] = $teacher;

         $data_layout["title"] = "CADP - Sistema de administraci&oacute;n";
         $data_layout["user_menu"] = $this->load->view('user/menu_view', '', true);
         $data_layout["content"] = $this->load->view('user/user_initial_view', $data_view, true);
         $this->load->view('layout_view', $data_layout);
       } else {
         $data_view['alert'] = '<script type="text/javascript"> alertify.error(\'<i class="fa fa-thumbs-down" aria-hidden="true"></i> Usuario y/o contraseña incorrectos.\'); </script>';         
         $data_layout["title"] = "CADP - Sistema de administraci&oacute;n";         
         $data_layout["content"] = $this->load->view('sign_in/sign_in_view', $data_view, true);
         $this->load->view('layout_view', $data_layout);
       }       
       
     } else { redirect(base_url().'sign_in', 'refresh'); }
   }
}
?> 