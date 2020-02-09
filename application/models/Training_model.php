<?php
  class Training_model extends CI_model{

    public function get_divisi(){
      return $this->db->get('divisi')->result();
    }

  }
 ?>
