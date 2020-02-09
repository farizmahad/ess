<?php
Class Mpdf_model extends CI_Model
{
    
  function select_data_siswa(){

    $this->db->select('*');
    $this->db->from('siswa');
    return $this->db->get()->result();
  }

  
function select_barang_ho($outlet){

    $this->db2->select('*');
    $this->db2->from($outlet);
    
   $this->db2->group_start();
   
    $this->db2->where('stok_moka !=','0');
    $this->db2->or_where('stok_real !=','0');
    $this->db2->or_where('stok_revisi !=','0');
    
    $this->db2->group_end();
    
    $this->db->group_by('sku');

    return $this->db2->get()->result();
  }
  

/*
  function select_barang_ho($outlet){

    $this->db2->select('*','DISTINCT(sku)');
    $this->db2->from($outlet);
    /*
    $this->db2->group_by(array('sku','name'));
    */

  /*
    return $this->db2->get()->result();
  }

  */

  function select_departemen_ho($outlet=""){

    $this->db2->distinct();
    $this->db2->select('dept');
    if($outlet){
      $this->db2->from($outlet);
    }else{
    $this->db2->from('m_barang_ho');
     }
    return $this->db2->get()->result();
  }
  

  function select_produk_departemen($departemen=""){
  	$this->db2->select('*');
    $this->db2->from('m_barang_ho');
    
    $this->db2->where('dept',$departemen);

    $this->db2->group_start();
    $this->db2->where('stok_moka !=','0');
    $this->db2->or_where('stok_real !=','0');
    $this->db2->group_end();
    return $this->db2->get()->result();

  }

  function select_barang_departemen($departemen,$outlet=""){

    $this->db2->select('*');
     if($outlet){
      $this->db2->from($outlet);
    }else{
    $this->db2->from('m_barang_ho');
     }
    

    $this->db2->group_start();
    $this->db2->where('dept',$departemen);
    $this->db2->or_where('code',$departemen);
    $this->db2->group_end();
    $this->db2->group_start();
    $this->db2->where('stok_moka !=','0');
    $this->db2->or_where('stok_real !=','0');
    $this->db2->group_end();
    $this->db2->group_by('sku');
    return $this->db2->get()->result();
  }

  function tambah_log($pelaksana,$sender,$date){

        $this->db2->set('sender',$pelaksana);
        $this->db2->set('target',$sender);
        $this->db2->set('date',$date);
        $this->db2->insert('t_log_report');
    }



}