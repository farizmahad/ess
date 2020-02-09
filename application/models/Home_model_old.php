<?php
Class Home_model extends CI_Model
{

// permintaan belum selesai yang akan ditampilkan dihalaman dashboard //
    function per_bel_selesai($ID,$daterange){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('id_user',$ID);
        $this->db->group_start();
        $this->db->where('last_status',1);
        $this->db->or_where('last_status',0);
        $this->db->group_end();
        $this->db->where('status_user !=',4);
        if($daterange){
            $tanggal = explode(" - ",$daterange);
            $dari = str_replace('/', '-', $tanggal[0]);
            $sampai = str_replace('/', '-', $tanggal[1]);

            $this->db->where("DATE(tanggal_pengajuan) >=", $dari);
            $this->db->where("DATE(tanggal_pengajuan)<=", $sampai);
        }
        return $this->db->get()->result();
    }

// count permintaan yang belum selesai di halaman dashboard	
	function count_per_bel_selesai($ID, $daterange=""){
		
		$this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('id_user',$ID);
        $this->db->group_start();
        $this->db->where('last_status',1);
        $this->db->or_where('last_status',0);
        $this->db->group_end();
        $this->db->where('status_user !=',4);
        if($daterange){
            $tanggal = explode(" - ",$daterange);
            $dari = str_replace('/', '-', $tanggal[0]);
            $sampai = str_replace('/', '-', $tanggal[1]);

            $this->db->where("DATE(tanggal_pengajuan) >=", $dari);
            $this->db->where("DATE(tanggal_pengajuan)<=", $sampai);
        }
        return $this->db->get()->num_rows();
	}
	
// permintaan orang lain yang akan ditujukan kepada dirinya

    function per_assign($ID){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('users','users.id = pengajuan.id_user');
        $this->db->where('users.id_line_manajer',$ID);
        $this->db->where('pengajuan.last_status','1');
        return $this->db->get()->result();
    }
// count pengajuan	
	function count_per_assign($ID){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('users','users.id = pengajuan.id_user');
        $this->db->where('users.id_line_manajer',$ID);
        $this->db->where('pengajuan.last_status','1');
        return $this->db->get()->num_rows();
    }
	
// permintaan orang lain yang akan ditujukan kepada dirinya

    function get_users($ID){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$ID);
        return $this->db->get()->result();
    }



}