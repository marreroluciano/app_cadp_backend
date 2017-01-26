<?php
  class Request_model extends CI_Model{
      
    function __construct(){
      parent::__construct();      
    }

    /* obtiene las solicitudes de un alumno */
    function get_student_requests($student_id){
      $this->db->select('request.id, date, start_date_justification, end_date_justification, type_request.detail as type_request_detail, request_state.detail as request_state_detail, request_state.class as request_class, id_request_state');
      $this->db->join('type_request', 'type_request.id = request.id_request_type');
      $this->db->join('request_state', 'request_state.id = request.id_request_state');
      $this->db->where('student_id',$student_id);
      $this->db->order_by("date", "desc");
      $query = $this->db->get('request');
      return($query->result());
    }
}
?> 