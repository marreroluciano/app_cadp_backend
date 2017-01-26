<?php
  class Student_evaluation_mark_model extends CI_Model{
      
    function __construct(){
      parent::__construct();      
    }

    /* obtiene las instancias de evaluación de un estudiante */
    function get_student_evaluations ($student_id){
      $this->db->select('date_hour, evaluation_instance.detail as evaluation_instance, mark.detail as mark');
      $this->db->join('evaluation', 'evaluation.id = student_evaluation_mark.evaluation_id', 'left');
      $this->db->join('evaluation_instance', 'evaluation_instance.id = evaluation.evaluation_instance_id');
      $this->db->join('mark', 'mark.id = student_evaluation_mark.mark_id');      
      $this->db->where('student_id', $student_id);
      $this->db->order_by("date_hour", "desc");
      $query = $this->db->get('student_evaluation_mark');
      return($query->result());
    }
  }
?> 