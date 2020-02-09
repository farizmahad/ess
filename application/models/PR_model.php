<?php
Class PR_model extends CI_Model
{

    public function cek_users($no_wa,$groupid){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('users_groups','users.id = users_groups.user_id');
        $this->db->where('phone',$no_wa);
        $this->db->where('group_id',$groupid);
        return $this->db->get()->result();
    }

  
}