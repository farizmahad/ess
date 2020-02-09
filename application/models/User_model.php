<?php
Class User_model extends CI_Model
{


//=============================================================================================================== select


    //========================================= lokasi

    function select_users($id){

        $this->db->select('jabatan.id_jabatan,jabatan.nama_jabatan,divisi.id_divisi,divisi.nama_divisi,users.id,users.username,users.email,users.first_name,users.last_name,users.company,users.phone,users.foto,users.id_divisi,users.id_jabatan');
        $this->db->from('users');
        $this->db->join('jabatan','jabatan.id_jabatan = users.id_jabatan');
        $this->db->join('divisi','divisi.id_divisi = users.id_divisi');
        return $this->db->get()->result();
    }


    function select_divisi(){

        $this->db->select('*');
        $this->db->from('divisi');
        return $this->db->get()->result();
    }

    function select_jabatan(){

        $this->db->select('*');
        $this->db->from('jabatan');
        return $this->db->get()->result();
    }


}