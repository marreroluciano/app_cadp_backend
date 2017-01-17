<?php
  class Teacher_model extends CI_Model{
      
    function __construct(){
      parent::__construct();      
    }

    /* obtiene un docente por su id */
    function get_teacher ($teacher_id){
      $this->db->join('teacher_position', 'teacher_position.id = teacher.teacher_position_id');
      $this->db->where('teacher.id',$teacher_id);
      $query = $this->db->get('teacher');
      return($query->result());
    }    
}
?> 