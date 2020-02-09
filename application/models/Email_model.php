<?php
Class Email_model extends CI_Model
{


//=============================================================================================================== select


    //========================================= lokasi
function select_email_masuk_id($ID,$search=""){

    $this->db->select('*');
    $this->db->from('email');

    $this->db->join('users','email.id_pengirim = users.id');

    $this->db->where('id_penerima',$ID);

    if($search){
        $this->db->where('users.email',$search);
    }
    return $this->db->get()->result();
}


    function select_email_masuk_id_paging($ID,$limit,$offset)
    {

        $this->db->select('*');
        $this->db->from('email');

        $this->db->join('users', 'email.id_pengirim = users.id');
        $this->db->where('id_penerima', $ID);

        $this->db->limit($limit, $offset);
        return $this->db->get()->result();

    }

    function total_email_masuk_id($ID){

        $this->db->select('*');
        $this->db->from('email');
        $this->db->join('users','email.id_pengirim = users.id');
        $this->db->where('id_penerima',$ID);

        return $this->db->get()->num_rows();
    }

    function select_email_detail_id($id){

        $this->db->select('*');
        $this->db->from('email');
        $this->db->where('id_email',$id);
        return $this->db->get()->result();
    }


    function cek_email_pengirim($id){

        $this->db->select('email');
        $this->db->from('users');
        $this->db->where('id',$id);
        return $this->db->get()->result();
    }


    function select_users(){

        $this->db->select('*');
        $this->db->from('users');
        return $this->db->get()->result();
    }


    function insert_email($id_pengirim,$id_penerima,$email_penerima,$isi_email,$tanggal,$subjek,$status_pesan){

        $this->db->set('id_pengirim', $id_pengirim);
        $this->db->set('id_penerima', $id_penerima);
        $this->db->set('email_penerima', $email_penerima);
        $this->db->set('isi_email', $isi_email);
        $this->db->set('tanggal', $tanggal);
        $this->db->set('subjek', $subjek);
        $this->db->set('status', 0);
        $this->db->set('status_pesan', $status_pesan);
        $this->db->insert('email');
    }

    function cek_pengirim($id){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id);
        return $this->db->get()->result();
    }

    function select_email_terkirim_id($ID){

        $this->db->select('*');
        $this->db->from('email');
        $this->db->join('users','email.id_pengirim = users.id');
        $this->db->where('id_pengirim',$ID);
        $this->db->where('status_pesan',1);
        return $this->db->get()->result();
    }

    function update_status_email($id){
        $this->db->set('status',1);
        $this->db->where('id_email',$id);
        $this->db->update('email');
    }



}