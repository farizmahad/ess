<?php
Class Toko_model extends CI_Model
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
        $this->db->order_by('id_detail','DESC');
        return $this->db->get()->result();

   }


   function daftar_riwayat_konfirmasi_toko($ID,$status){
        $this->db->select('*');
        $this->db->from('history_pengajuan');
        $this->db->join('detail_pengajuan','detail_pengajuan.id_detail= history_pengajuan.id_pengajuan');
        $this->db->join('users','users.id= detail_pengajuan.id_user');
        $this->db->where('history_pengajuan.status_history','3');
        $this->db->where('history_pengajuan.id_user_approval',$ID);
        if($status=="diterima"){
            
            $this->db->group_start();
            $this->db->where('history_pengajuan.status','0');
            $this->db->or_where('history_pengajuan.status','5');
            $this->db->group_end();

        }elseif($status=="direvisi"){
            $this->db->where('history_pengajuan.status','7');
        }elseif($status=="ditolak"){
            $this->db->where('history_pengajuan.status','6');
        }
        return $this->db->get()->result();

    }


    function daftar_produk_email_toko($id_detail,$draft,$id_kacab_regional){

        $this->db->select('*');
        $this->db->from('detail_pengajuan');
        $this->db->join('users','users.id= detail_pengajuan.id_user');
        /*
        $this->db->where('draft',$draft);
         if($draft=="4"){
        $this->db->where('users.id_line_manajer',$id_kacab_regional);
        }elseif($draft=="5" or $draft=="0"){
            $this->db->join('divisi','divisi.id_divisi= users.id_divisi');
            $this->db->where('divisi.id_kacab_regional',$id_kacab_regional);
        }
        */
        $this->db->where_IN('id_detail',$id_detail);
        return $this->db->get()->result();

   }


     function daftar_detail_produk($id_detail){

        $this->db->select('*');
        $this->db->from('detail_pengajuan');
        $this->db->join('users','users.id= detail_pengajuan.id_user');
        $this->db->where_IN('id_detail',$id_detail);
        return $this->db->get()->result();

   }




   function cek_kacab_regional($id){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('divisi','users.id_divisi= divisi.id_divisi');
        $this->db->where('users.id',$id);
        return $this->db->get()->result();
   }



   function pengecekan_konfirmasi($id_detail,$draft){
        $this->db->select('*');
        $this->db->from('detail_pengajuan');
        $this->db->where('id_detail',$id_detail);
        $this->db->where('draft',$draft);
        return $this->db->get()->result();
   }


      function tambah_riwayat_produk($id_detail_barang,$status,$draft,$groupid,$id_line_manajer="",$tanggal_konfirmasi){

        $this->db->set('id_pengajuan', $id_detail_barang);
        $this->db->set('status', $draft);
        $this->db->set('groupid', $groupid);
        $this->db->set('tanggal', $tanggal_konfirmasi);
        $this->db->set('status_history', $status);
        if($id_line_manajer){
             $this->db->set('id_user_approval', $id_line_manajer);
        }
        $this->db->insert('history_pengajuan');
    }

    function riwayat_produk($id_detail){
        $this->db->select('*');
        $this->db->from('history_pengajuan');
        $this->db->join('users','users.id= history_pengajuan.id_user_approval');
        $this->db->where('id_pengajuan',$id_detail);
        $this->db->where('status_history','3');
        return $this->db->get()->result();
   }


   function tampil_daftar_kategori($id_pic=""){

        $this->db->select('*');
        $this->db->from('pic');
        $this->db->where('id_user',$id_pic);
        return $this->db->get()->result();
   }


   function tambah_purchase_request(){

   }

   function tampil_user_lengkap($id_pengirim){
    
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id_pengirim);
        $this->db->join('divisi','users.id_divisi= divisi.id_divisi');
        return $this->db->get()->result();
   }


   function tampil_detail_pengajuan($id_detail_pengajuan,$draft){

        $this->db->select('*');
        $this->db->from('detail_pengajuan');
        $this->db->where('id_detail',$id_detail_pengajuan);
        $this->db->where('draft',$draft);
        return $this->db->get()->result();

   }

}