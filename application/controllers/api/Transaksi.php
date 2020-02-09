<?php

  defined('BASEPATH') OR exit ('No direct script access allowed');

  require APPPATH . '/libraries/REST_Controller.php';
  use Restserver\Libraries\REST_Controller;

  class Transaksi extends Rest_Controller {

    function __construct($config = 'rest'){
      parent:: __construct($config);
      /*
      $this->load->database();
      */
       $this->db2 = $this->load->database('database2', TRUE);
    }

    function transaksi_get(){
      $id = $this->get('id');
      if($id == ''){
        $kontak = $this->db2->get('t_transaksi')->result();
      }else{
        $this->db2->where('id', $id);
        $kontak = $this->db2->get('t_transaksi')->result();
      }

      $this->response($kontak, 200);
    }

    function index_post(){
      $data = array(
        'id' => $this->post('id'),
        'nama'=> $this->post('nama'),
        'nomor'=> $this->post('nomor')
      );

      $insert = $this->db2->insert('telepon', $data);

      if($insert){
        $this->response($data, 200);
      }else{
        $this->response(array('status' => 'fail', 502));
      }
    }

    //next


  }
 ?>
