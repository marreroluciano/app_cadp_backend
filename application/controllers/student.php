<?php
  class Student extends CI_Controller {
    function __construct(){      
      parent::__construct();
      $this->load->model('user_teacher_model');
      $this->load->model('student_model');
      $this->load->library('session');
    }
      
   function index () {
     if ($this->user_teacher_model->isLogin()) {
       $this->load->library('pagination');
       $config['per_page']    = 25;
       $from                  = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1)*$config['per_page'] : 0;
       $config['base_url']    = base_url().'student/index/';
       $config['total_rows']  = $this->student_model->get_total_student();
       $config['uri_segment'] = 3;
       $config['num_links']   = 5;
       $config['use_page_numbers'] = TRUE;

       $config['first_link'] = 'Primero';
       $config['last_link'] = 'Último';
       $config['next_link'] = '&gt;';
       $config['prev_link'] = '&lt;';

       $config['full_tag_open']  = '<ul class="pagination  pagination-sm">';
       $config['full_tag_close'] = '<li><a>Total de alumnos: '.$config['total_rows'].'. </a></li></ul>';
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

       $students = $this->student_model->get_students($from, $config['per_page']);

       $data_view['students'] = $students;
       $data_view['pagination'] = $this->pagination->create_links();

       $data_menu_view['controller'] = 'student';
       $data_menu_view['method'] = 'search';
       $data_menu_view['result_id'] = 'result_list';

       $data_layout["user_menu"] = $this->load->view('user/menu_view', $data_menu_view, true);
       $data_layout["content"] = $this->load->view('student/index', $data_view, true);
       $this->load->view('layout_view', $data_layout);
     } else {
       $data_layout["content"] = $this->load->view('sign_in/sign_in_view', '', true);
       $this->load->view('layout_view', $data_layout);
     }
   }

   function search() {
     if ( (empty($_POST ) != true) && ($this->user_teacher_model->isLogin()) ) {        
       $text_to_search = $this->input->post('text_to_search');
       $students = $this->student_model->search($text_to_search);
       /* armar la salida */
       $output = ''; 
       if (sizeof($students)>0) {

         foreach ($students as $key => $value) {
           $output.= '<tr>';
           $output.= '<td><small>'.$value->dni.'</small></td>';
           $output.= '<td><small>'.$value->file_number.'</small></td>';
           $output.= '<td><small>'.$value->surname_and_name.'</small></td>';
           $output.= '<td><small>'.$value->turn.'</small></td>';
           $promotion = ($value->promotion)?"SI":"NO";
           $output.= '<td><small>'.$promotion.'</small></td>';
           $output.= '<td><small>'.$value->attendance.'</small></td>';
           $output.= '<td><small>';
           $output.= '<a href="'.base_url().'student/view/'.$value->id.'"><button type="button" class="btn btn-info btn-xs" data-toggle="tooltip" title="M&aacute;s informaci&oacute;n"><i class="fa fa-info-circle" aria-hidden="true"></i></button></a>';
           $output.= '</small></td>';
           $output.= '</tr>';
         }
         $message = 'alertify.success(\'<i class="fa fa-thumbs-up" aria-hidden="true"></i> '.sizeof($students).' resultado/s.\');';
       } else { $message = 'alertify.error(\'<i class="fa fa-thumbs-down" aria-hidden="true"></i> '.sizeof($students).' resultado/s.\');';}
       $output.= '<script type="text/javascript">';
       $output.= '$(document).ready(function(){';
       $output.= $message;
       $response = '<ul class=\'pagination pagination-sm\'>';
       $response.= '<li><a>Filtro: '.$text_to_search.'</a></li>';
       $response.= '<li><a>Resultados: '.sizeof($students).'</a></li>';
       $response.= '<li><a href=\''.base_url().'student\' data-toggle=\'tooltip\' title=\'Quitar filtro\'><i class=\'fa fa-times\' aria-hidden=\'true\'></i></a></li>';
       $response.= '</ul>';         
       $output.= '$("#pagination_top").html("'.$response.'");';
       $output.= '$("#pagination_down").html("'.$response.'");';
       $output.= '$(\'[data-toggle="tooltip"]\').tooltip();';
       $output.= '});';
       $output.= '</script>';
       echo $output;
     } else { redirect(base_url().'error_404', 'refresh'); }
   }
}
?> 