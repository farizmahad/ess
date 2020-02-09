<?php

  class Training extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->library('cart');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('Training_model');
    }

    public function index()
    {
      $data['divisi'] = $this->Training_model->get_divisi();

      $this->form_validation->set_rules('peserta', 'Peserta', 'required');
      $this->form_validation->set_rules('penyelenggara', 'Penyelenggara', 'required');
      $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
      $this->form_validation->set_rules('riwayat', 'Riwayat', 'required');
      $this->form_validation->set_rules('rekomendasi', 'Rekomendasi', 'required');
      $this->form_validation->set_rules('biaya', 'Biaya', 'required');
      $this->form_validation->set_rules('makan', 'Biaya Makan', 'required');
      $this->form_validation->set_rules('akomodasi', 'Biaya Akomodasi', 'required');
      $this->form_validation->set_rules('transport', 'Biaya Transport', 'required');
      $this->form_validation->set_rules('total', 'Total Biaya', 'required');

      if( $this->form_validation->run() == FALSE){
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('dashboard_training', $data);
        $this->load->view('layouts/footer');
      } else {
        redirect('daftar-permintaan','Refresh');
      }

    }
  }
 ?>
