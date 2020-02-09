<?php
Class Purchasing_model extends CI_Model
{


//=============================================================================================================== select


    //========================================= lokasi
    function cek_divisi($ID){
        $this->db->select('id_divisi');
        $this->db->from('users');
        $this->db->where('id',$ID);
        return $this->db->get()->result();
    }

    function select_pengajuan_by_divisi($id_divisi){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('users','pengajuan.id_user = users.id');
        $this->db->join('jenis_request','jenis_request.id_jenis_request = pengajuan.id_jenis_request');


        $this->db->where('users.id_divisi',$id_divisi);
        $this->db->where('pengajuan.status_user',0);
        return $this->db->get()->result();
    }
    function select_pengajuan_purchasing($daterange=""){
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('status_user',2);
        $this->db->where('last_status',1);
        if($daterange) {
            $tanggal = explode(" - ", $daterange);
            $dari = str_replace('/', '-', $tanggal[0]);
            $sampai = str_replace('/', '-', $tanggal[1]);

            $this->db->where("DATE(tanggal_pengajuan) >=", $dari);
            $this->db->where("DATE(tanggal_pengajuan)<=", $sampai);
        }
        return $this->db->get()->result();
    }

    function approve_pengajuan($status_approval,$id_pengajuan,$approve_by,$ket){


        $this->last_status =$status_approval;
        $this->id_user_approval =$approve_by;
        $this->ket=$ket;
        if($status_approval==1) {
            $this->status_user = 4;
        }else{
            $this->status_user = 0;
        }
        $this->db->update('pengajuan', $this, array('id_pengajuan' => $id_pengajuan));
    }

    function insert_history_pengajuan($approve_by,$id_pengajuan,$status_approval,$tanggal,$catatan,$ket)
    {
        $this->db->set('id_pengajuan',$id_pengajuan);
        $this->db->set('status',$status_approval);
        $this->db->set('catatan',$catatan);
        $this->db->set('tanggal',$tanggal);
        $this->db->set('id_user_approval',$approve_by);
        $this->db->set('ket',$ket);
        $this->db->insert('history_pengajuan');
    }


}