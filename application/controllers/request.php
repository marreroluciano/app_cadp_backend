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

   function view(){
     if ($this->user_teacher_model->isLogin()) {
       $this->db->trans_start();

       $request_id = $this->input->post('element_id');
       $request = $this->request_model->get_request($request_id);
       $data = array('id_request_state' => 4);
       $request_state = $this->request_model->update($request_id, $data);

       $output = '<div class="row">';
       $output.= '<div class="col-xs-6">';
       $output.= '<ul class="list-group">';

       $output.= '<li class="list-group-item"><small><strong>Tipo de solicitud: </strong>'.$request[0]->type_request_detail.'</small></li>';

       switch ($request[0]->id_request_type) {
         case 1:
           $output.= '<li class="list-group-item"><small><strong>Turno actual: </strong>'.$request[0]->current_turn.'</small></li>';
           $output.= '<li class="list-group-item"><small><strong>Turno solicitado: </strong>'.$request[0]->requested_shift.'</small></li>';
           $output.= '<li class="list-group-item"><small><strong>Motivo: </strong>'.$request[0]->reason.'</small></li>';
         break;
         case 2:
           $date = date_create($request[0]->start_date_justification);
           $date = date_format($date, 'd/m/Y');
           $output.= '<li class="list-group-item"><small><strong>Fecha desde: </strong>'.$date.'</small></li>';
           $date = date_create($request[0]->end_date_justification);
           $date = date_format($date, 'd/m/Y');
           $output.= '<li class="list-group-item"><small><strong>Fecha hasta: </strong>'.$date.'</small></li>';
         break;
       }
       
       $output.= '</ul>';
       $output.= '</div>';
       $output.= '<div class="col-xs-6">';

       $output.= '<div id="links">';
       $output.= '<a href="'.base_url().'images/uploads/'.$request[0]->attached.'" data-toggle="tooltip" title="Certificado" data-gallery>';
       $output.= '<img src="'.base_url().'images/uploads/'.$request[0]->attached.'" alt="Certificado" class="img-rounded img-responsive center-block" width="50%"/>';
       $output.= '</a>';
       $output.= '</div>';

       $output.= '</div>';       

       $output.= '</div>';

       $output.= '<div class="row">'; 
       $output.= '<div class="col-xs-12">';

       $output.= '<button class="btn btn-success" data-toggle="tooltip" title="Aceptar solicitud" onclick="confirm(\''.base_url().'\')"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Aceptar solicitud </button>';
       $output.= '&nbsp;';
       $output.= '<button class="btn btn-danger" data-toggle="tooltip" title="Rechazar solicitud" onclick="confirm(\''.base_url().'\')"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Rechazar solicitud </button>';

       $output.= '</div>';
       $output.= '</div>';

       $output.= '<script type="text/javascript">';
       $output.= '$(document).ready(function(){';
       $output.= '$("#state_class_'.$request_id.'").html("<i class=\'fa fa-cog text-warning\' aria-hidden=\'true\' data-toggle=\'tooltip\' title=\'EN PROCESO\'></i>");';
       $output.= '$(\'[data-toggle="tooltip"]\').tooltip();';
       $output.= '});';
       $output.= '</script>';

       $this->db->trans_complete();
       echo $output;
     } else { /* página 404 */ }
   }
}
?> 