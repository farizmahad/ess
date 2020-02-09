<?php
Class Purchase_model extends CI_Model
{

    public function tampil_barang_id($id_barang){

        $this->db->select('*');
        $this->db->from('mst_barang');
        $this->db->where('id_barang',$id_barang);
        return $this->db->get()->result();
    }


    function tambah_detail_pengajuan($id_pengajuan,$qty,$satuan,$harga,$tharga,$id_barang){
        $this->db->set('id_pengajuan', $id_pengajuan);
        $this->db->set('qty', $qty);
        $this->db->set('satuan',$satuan);
        $this->db->set('harga', $harga);
        $this->db->set('tharga', $tharga);
        $this->db->set('id_barang', $id_barang);
        $this->db->insert('detail_pengajuan');
        
    }

  
}