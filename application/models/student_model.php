<?php
  class Student_model extends CI_Model{
      
    function __construct(){
      parent::__construct();      
    }

    /* obtiene los estudiantes del curso */
    function get_students ($start, $limit){
      $this->db->select('student.id, dni, surname_and_name, file_number, turn.detail as turn, student.promotion as promotion, count(student_attendance_list.id) as attendance'); 
      $this->db->join('turn', 'turn.id = student.turn_id', 'left');
      $this->db->join('student_attendance_list', 'student_attendance_list.student_id = student.id', 'left');
      $this->db->group_by("student.id");
      $this->db->order_by("surname_and_name", "asc");
      $this->db->limit($limit, $start);
      $query = $this->db->get('student');
      return($query->result());
    }

    /* obtiene el total de los alumnos */
    function get_total_student(){
      return ($this->db->get('student')->num_rows());
    }

    function search($text_to_search) {
      $this->db->select('student.id, dni, surname_and_name, file_number, turn.detail as turn, student.promotion as promotion, count(student_attendance_list.id) as attendance'); 
      $this->db->select('student.id, dni, surname_and_name, file_number, turn.detail as turn, student.promotion as promotion, count(student_attendance_list.id) as attendance'); 
      $this->db->join('turn', 'turn.id = student.turn_id', 'left');
      $this->db->join('student_attendance_list', 'student_attendance_list.student_id = student.id', 'left');
      $this->db->like('dni', $text_to_search);
      $this->db->or_like('surname_and_name', $text_to_search);
      $this->db->or_like('file_number', $text_to_search);
      $this->db->group_by("student.id");
      $this->db->order_by("surname_and_name", "asc");
      $query = $this->db->get('student');

      return($query->result());
    }
}
?> 