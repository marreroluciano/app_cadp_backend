<?php
  class Student_attendance_list_model extends CI_Model{
      
    function __construct(){
      parent::__construct();      
    }

    /* obtiene las ausencias de un estudiante */
    function get_student_absents ($student_id){
      $this->db->select('date, teacher.surname_and_name as surname_and_name, type_attendance.detail as type_attendance');
      $this->db->join('type_attendance', 'type_attendance.id = student_attendance_list.type_attendance_id');
      $this->db->join('teacher', 'teacher.id = student_attendance_list.teacher_id');
      $this->db->where('type_attendance_id <>', 2);
      $this->db->where('student_id', $student_id);
      $this->db->order_by("date", "desc");
      $query = $this->db->get('student_attendance_list');
      return($query->result());
    }
  }
?> 