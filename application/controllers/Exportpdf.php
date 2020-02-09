<?php defined('BASEPATH') OR die('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Exportpdf extends CI_Controller {

     public function __construct()
     {
          parent::__construct();
          
         $this->load->model('Mpdf_model');
         $this->load->helper('tgl_indo_helper');
        
         /*
          $this->load->model('Usulan_model');
          */
          
     }

     public function print()
  {

    $id_pengajuan=$this->input->get('id_pengajuan');
    $data['id_detail']=$id_pengajuan;
    /*
    $data['detail_barang']=$this->user_pengajuan_model->get_detail_barang($id_detail);
    */
    $data['permintaan_ajuan']=$this->Pengajuan_model->select_pengajuan_detail($id_pengajuan);
    $data['history']=$this->Pengajuan_model->history_pengajuan($id_pengajuan);
    $data['detail_barang']=$this->Pengajuan_model->detail_barang_per_id($id_pengajuan);
    $data['id_pengajuan']=$id_pengajuan;

    $mpdf = new \Mpdf\Mpdf();
    $data = $this->load->view('hasilPrint', $data, TRUE);
    $mpdf->WriteHTML($data);
    $mpdf->Output();
  }


}