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

    /* obtiene el total de solicitudes */
    function get_total_request(){
      return ($this->db->get('request')->num_rows());
    }

    /* obtiene las solicitudes */
    function get_requests($start, $limit) {
      $this->db->select('request.id, date, student.surname_and_name, turn.detail as turn, type_request.detail as type_request, request_state.class as request_state_class, request_state.detail as state');
      $this->db->join('student', 'student.id = request.student_id');
      $this->db->join('type_request', 'type_request.id = request.id_request_type');
      $this->db->join('turn', 'turn.id = request.current_turn');
      $this->db->join('request_state', 'request_state.id = request.id_request_state');
      $this->db->join('teacher', 'teacher.id = request.teacher_id', 'left');
      $this->db->order_by("date", "desc");
      $this->db->limit($limit, $start);
      $query = $this->db->get('request');
      return($query->result());
    }
}
?> 