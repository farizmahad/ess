<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_request extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */




    function __construct()
    {
        parent::__construct();
        
        $this->load->helper('tgl_indo');
        $this->load->model('Home_model');
		    $this->load->model('Pengajuan_model');
        $this->load->model('PR_model');
	      $this->load->library('upload');
        $this->load->helper('url');
    }

	 public function keputusan_telepon(){
       
       $purchase_request=$this->input->get('id_po');
         $var_purchase_request           =explode("-",$purchase_request);
         $id_pr                        =$var_purchase_request[0];
         $groupid                      =$var_purchase_request[1];
         $no_wa                        =$var_purchase_request[2];

         $cek_user_approv=$this->PR_model->cek_users($no_wa,$groupid);
         
        
         foreach($cek_user_approv as $row){
          $data['email_asli']=$row->email;
         }
          
        $history_terakhir=$this->Pengajuan_model->history_terakhir($id_pr);
        foreach($history_terakhir as $his){
            $urutan=$his->urutan;
            $grup_sekarang=$his->name;
        }
        $data['grup_sekarang']=$grup_sekarang;
        $data['urutan']=$urutan;
    


         $data['vendor']=$this->Pengajuan_model->select_vendor($id_pr);
         $data['history']=$this->Pengajuan_model->history_pengajuan($id_pr);
         $data['permintaan_ajuan']=$this->Pengajuan_model->select_pengajuan_detail($id_pr);
         $data['detail_barang']=$this->Pengajuan_model->detail_barang_per_id($id_pr);
         $permintaan_ajuan=$this->Pengajuan_model->select_pengajuan_detail($id_pr);
         foreach($permintaan_ajuan as $per){
             $data['no_pengajuan']=$per->no_pengajuan;
             $data['id_pengajuan']=$per->id_pengajuan;
             $data['first_name']=$per->first_name;
             $data['last_name']=$per->last_name;
             $data['nama_divisi']=$per->nama_divisi;
             $data['nama_jabatan']=$per->nama_jabatan;
             $data['tanggal_pengajuan']=$per->tanggal_pengajuan;
             $data['tanggal_required']=$per->tanggal_required;
             $data['jenis_request']=$per->jenis_request;
             $data['keterangan']=$per->keterangan;
             $data['last_status']=$per->last_status;
             $data['id_pengirim']=$per->id_user;
             $data['id_user_approval']=$per->id_user_approval;
             $data['status_user']=$per->status_user;
             $data['id_jenis_request']=$per->id_jenis_request;
             $data['ket']=$per->keterangan;
             $data['lampiran']=$per->lampiran;
             $data['tujuan']=$per->tujuan;
             $data['metode_pembayaran']=$per->metode_pembayaran;
             $data['ppn']=$per->ppn;
             $data['nama_gedung']=$per->nama_gedung;
             $data['grand_total']=$per->grand_total;
             $nomor_pengajuan=$per->no_pengajuan;
             $id_pengajuan=$per->id_pengajuan;
             $tgl_pengajuan=$per->tanggal_pengajuan;
         }
         $this->load->view('konfirmasi_wa_pr',$data);

   }

   

}
