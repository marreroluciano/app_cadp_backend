<?php
  class Request extends CI_Controller {
    function __construct(){      
      parent::__construct();      
      $this->load->model('user_teacher_model');
      $this->load->model('request_model');
      $this->load->library('session');
    }
      
   function index () {
     if ($this->user_teacher_model->isLogin()) {
       $this->load->library('pagination');
       $config['per_page']    = 25;
       $from                  = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1)*$config['per_page'] : 0;
       $config['base_url']    = base_url().'request/index/';
       $config['total_rows']  = $this->request_model->get_total_request();
       $config['uri_segment'] = 3;
       $config['num_links']   = 5;
       $config['use_page_numbers'] = TRUE;

       $config['first_link'] = 'Primero';
       $config['last_link'] = 'Último';
       $config['next_link'] = '&gt;';
       $config['prev_link'] = '&lt;';

       $config['full_tag_open']  = '<ul class="pagination  pagination-sm">';
       $config['full_tag_close'] = '<li><a>Total de solicitudes: '.$config['total_rows'].'. </a></li></ul>';
       $config['cur_tag_open']  = '<li class="active"><a>';
       $config['cur_tag_close'] = '</a></li>';
       $config['first_tag_open']  = '<li>';
       $config['first_tag_close'] = '</li>';
       $config['last_tag_open']  = '<li>';
       $config['last_tag_close'] = '</li>';
       $config['next_tag_open']  = '<li>';
       $config['next_tag_close'] = '</li>';
       $config['prev_tag_open']  = '<li>';
       $config['prev_tag_close'] = '</li>';
       $config['num_tag_open']  = '<li>';
       $config['num_tag_close'] = '</li>';
       $this->pagination->initialize($config);

       $requests = $this->request_model->get_requests($from, $config['per_page']);

       $data_view['requests'] = $requests;
       $data_view['pagination'] = $this->pagination->create_links();

       $data_menu_view['controller'] = 'request';
       $data_menu_view['method'] = 'search';
       $data_menu_view['result_id'] = 'result_list';

       $data_layout["user_menu"] = $this->load->view('user/menu_view', $data_menu_view, true);
       $data_layout["content"] = $this->load->view('request/index', $data_view, true);
       $this->load->view('layout_view', $data_layout);
     } else {
       $data_layout["content"] = $this->load->view('sign_in/sign_in_view', '', true);
       $this->load->view('layout_view', $data_layout);
     }
   }
}
?> 