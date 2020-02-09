<?php
Class Api_Kacab_model extends CI_Model
{

	function daftar_konfirmasi_produk_toko($ID,$draft){

        $this->db->select('*');
        $this->db->from('detail_pengajuan');
        $this->db->join('users','users.id= detail_pengajuan.id_user');
      
        $this->db->where('draft',$draft);
        
        if($draft=="4"){
        $this->db->where('users.id_line_manajer',$ID);
        }elseif($draft=="5" or $draft=="0"){
            $this->db->join('divisi','divisi.id_divisi= users.id_divisi');
            $this->db->where('divisi.id_kacab_regional',$ID);
        }
        return $this->db->get()->result();

   }



}