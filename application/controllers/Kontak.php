<?php

  defined('BASEPATH') OR exit ('No direct script access allowed');

  require APPPATH . '/libraries/REST_Controller.php';
  use Restserver\Libraries\REST_Controller;

  class Kontak extends Rest_Controller {

    function __construct($config = 'rest'){
      parent:: __construct($config);
      $this->load->database();
      $this->db2 = $this->load->database('database2', TRUE);
    }


    //nu ieu index default, kapanggil via http://localhost/test/index.php/api/kontak
    function index_get(){
      $id = $this->get('id');
      if($id == ''){
        $kontak = $this->db2->get('t_outlet')->result();
      }else{
        $this->db2->where('id', $id);
        $kontak = $this->db2->get('t_outlet')->result();
      }
      $this->response($kontak, 200);
    }


    //nu ieu get data_barang berdasarkan id_outlet, panggil via http://localhost/test/index.php/api/kontak/data_barang?{id_outlet=10}
    //id_barang teu required

    function data_barang_get(){
      $id_barang = $this->get('id');
      $status = $this->get('status');
      $dept = $this->get('dept');
      if($id_barang == ''){
        if($status != ''){
          if($dept != ''){
            $this->db->where('dept', $dept);
          }
          $this->db->where('status_so', $status);
        }
        $data = $this->db->get('m_barang', 50)->result();
      }else{
        if($dept != ''){
          $this->db->where('dept', $dept);
        }
        $this->db->where('status_so', $status);
        $this->db->where('sku', $id_barang);
        $data = $this->db->get('m_barang', 50)->result();
      }

      $this->response($data, 200);
    }


    //nu ieu fungsi cari barang berdasarkan sku ato nama barang, panggil via http://localhost/test/index.php/api/kontak/cari_barang
    function cari_barang_get(){
      $keyword = $this->get('id');
      $status = $this->get('status');
      $dept = $this->get('dept');
      if($keyword == ''){
        if($dept != ''){
          $this->db->where('dept', $dept);
        }
        $data = $this->db->get('m_barang')->result();
      }else{
        $this->db->like('sku', $keyword);
        $this->db->or_like('name', $keyword);
        $this->db->where('status_so', $status);
        if($dept != ''){
          $this->db->where('dept', $dept);
        }
        $data = $this->db->get('m_barang')->result();
      }

      $this->response($data, 200);
    }

    function update_data_get(){

      $sku = $this->get('sku');
      $stok_moka = $this->get('stok_moka');
      $stok_real = $this->get('stok_real');

      //$this->response(array('sku'=> $sku, 200));
      $this->db->set('stok_moka', $stok_moka);
      $this->db->set('stok_real', $stok_real);
      $this->db->set('status_so', 1);
      $this->db->where('sku', $sku);
      $update = $this->db->update('m_barang');
      //
      if($update){
        $this->response(array('status' => '200'));
      }else{
        $this->response(array('status' => 'fail', 502));
      }

    }


    //nu ieu contoh post can aya isina
    function index_post(){

        $sku = $this->get('sku');
        $stok_moka = $this->get('stok_moka');
        $stok_real = $this->get('stok_real');


      // = $this->db->insert('telepon', $data);

      $this->db->set('stok_moka', $stok_moka);
      $this->db->set('stok_real', $stok_real);
      //$this->db->where('sku', $sku);
      $update = $this->db->update('m_barang');

      if($update){
        $this->response($data, 200);
      }else{
        $this->response(array('status' => 'fail', 502));
      }

    }

    //next


  }
 ?>
