<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HRD extends CI_Controller {

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
		if (!$this->ion_auth->logged_in()){ redirect('login');}
		$this->load->model('HRD_model'); 
        $this->load->model('Profile_model');
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		$this->load->helper('tgl_indo');
	}
	
	public function detail_pekerjaan_pegawai()
	{
		$data['divisi']=$this->HRD_model->get_divisi();
		$data['jabatan']=$this->HRD_model->get_jabatan();
		$data['users']=$this->HRD_model->get_users();

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
	    $this->load->view('hrd/detail_pekerjaan_pegawai',$data);
	    $this->load->view('layouts/footer');
		
	}


	public function replay($id){
		$data['divisi']=$this->HRD_model->get_divisi();
		$data['jabatan']=$this->HRD_model->get_jabatan();
        $data['id_user']=$id;
        $data['history_job_profile']=$this->HRD_model->history_job_profile($id);
        $history=$this->HRD_model->cek_users($id);
        foreach($history as $de){
        	$data['first_name']=$de->first_name;
        	$data['last_name']=$de->last_name;
        }

        $this->load->view('hrd/replay',$data);
	}

   public function detail($id)
	{
		$data['divisi']=$this->HRD_model->get_divisi();
		$data['jabatan']=$this->HRD_model->get_jabatan();
		$data['users']=$this->HRD_model->cek_users($id);
		 $data['id_user']=$id;
        $data['history_job_profile']=$this->HRD_model->history_job_profile($id);
        $data['compensation']=$this->HRD_model->history_compensation($id);
        $history=$this->HRD_model->cek_users($id);
        foreach($history as $de){
        	$data['first_name']=$de->first_name;
        	$data['last_name']=$de->last_name;
        }
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
	    $this->load->view('hrd/detail_history',$data);
	    $this->load->view('layouts/footer');
		
	}
	

   public function tampil_ubah_pegawai($id){

        $data['divisi']=$this->HRD_model->get_divisi();
        $data['jabatan']=$this->HRD_model->get_jabatan();
        $data['provinsi']=$this->HRD_model->tampil_provinsi();
        $data['kota']=$this->HRD_model->tampil_kota();
        $tampil_ubah_pegawai=$this->HRD_model->tampil_satu_users($id);
        $data['tanda']='Ubah';
        foreach($tampil_ubah_pegawai as $row){
            $data['id']  =$row->id;
            $data['id_pegawai']  =$row->ID_pegawai;
            $data['nama']        =$row->first_name;
            $data['id_divisi']   =$row->id_divisi;
            $data['id_jabatan']  =$row->id_jabatan;
            $data['jenis_kelamin']  =$row->jenis_kelamin;
            $data['company      ']  =$row->company;
            $data['phone']   =$row->phone;
            $data['id_line_manajer']   =$row->id_line_manajer;
            $data['status_pegawai']   =$row->status_pegawai;
            $data['tanggal_masuk']   =$row->tanggal_masuk;
            $data['fte']   =$row->fte;
            $data['id_provinsi_lahir']   =$row->id_provinsi_lahir;
            $data['id_kota_lahir']   =$row->id_kota_lahir;
            $data['status_pernikahan']   =$row->status_pernikahan;
            $data['agama']   =$row->agama;
            $data['status_kewarganegaraan']   =$row->status_kewarganegaraan;
             $data['email']   =$row->email;
             
        

        }
        



        $data['atasan_langsung']=$this->Profile_model->atasan_langsung();

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('hrd/tampil_ubah_pegawai',$data);
        $this->load->view('layouts/footer');

   
   }

   public function tampil_tambah_pegawai(){

        $data['divisi']=$this->HRD_model->get_divisi();
        $data['jabatan']=$this->HRD_model->get_jabatan();
        $data['provinsi']=$this->HRD_model->tampil_provinsi();
        $data['kota']=$this->HRD_model->tampil_kota();
        $data['tanda']='Tambah';
        
        $data['atasan_langsung']=$this->Profile_model->atasan_langsung();

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('hrd/tampil_ubah_pegawai',$data);
        $this->load->view('layouts/footer');

   
   }

   public function simpan_history_pekerjaan(){
   	    $tanggal_input                 = DATE('Y-m-d');
        $tanggal                       = $this->input->post('tanggal');
        $id_divisi                     = $this->input->post('id_divisi');
        $id_jabatan                    = $this->input->post('id_jabatan');
        $type                          = $this->input->post('type');
        $id_history_job                = $this->input->post('id_history_job');


        $tanggal_requi       = date("Y-m-d", strtotime($tanggal) );

        $id_user                       = $this->input->post('id_user');
        $reason                        = $this->input->post('reason');

        if($id_history_job){

        $this->HRD_model->update_history_job($id_history_job,$id_divisi,$id_jabatan,$type,$id_user,$reason,$tanggal_requi);


           
        }else{
         $this->HRD_model->insert_history_job($id_divisi,$id_jabatan,$type,$id_user,$reason,$tanggal_requi,$tanggal_input);  
         

        }



        redirect('HRD/detail/'.$id_user);

    }



   public function simpan_kompensasi_pekerjaan(){
   	   

        $tanggal                       = $this->input->post('tanggal');
        $id_jabatan                    = $this->input->post('id_jabatan');
        
        $primary_compensation          = $this->input->post('primary_compensation');
      
        $id_user                       = $this->input->post('id_user');
        $tanggal_requi       = date("Y-m-d", strtotime($tanggal) );
        $reason                        = $this->input->post('reason');
        $id_history_com               = $this->input->post('id_history_com');
        $base_pay                      = $this->input->post('base_pay');
        $persen_change=($primary_compensation/$base_pay) *100;
        $persen=round($persen_change,2);
        $id_history_job=0;

        if($id_history_com){

        $this->HRD_model->update_compensation($id_jabatan,$primary_compensation,$id_history_job,$id_user,$tanggal_requi,$reason,$base_pay,$persen,$id_history_com);


           
        }else{
         $this->HRD_model->insert_compensation($id_jabatan,$primary_compensation,$id_history_job,$id_user,$tanggal_requi,$reason,$base_pay,$persen);     
              
        }



        redirect('HRD/detail/'.$id_user);

    }


	
   public function hapus_history()
	{
$id                       = $this->input->get('id');
        $id_user                  = $this->input->get('id_user');
		$this->HRD_model->hapus_history($id);
		redirect('HRD/detail/40');
	}


     public function hapus_compensation()
	{
        $id                       = $this->input->get('id');
        $id_user                  = $this->input->get('id_user');

       
		$this->HRD_model->hapus_compensation($id);
		redirect('HRD/detail/'.$id_user);
	}

	function result(){
       $id= $this->input->post('ids');
       $tambahan= $this->input->post('tambahan');

        $data['id']=$id;

        $data['tambahan']=$tambahan;
        $data['history']=$this->HRD_model->get_history_profile($id);
        $this->load->view('hrd/result',$data);
    }
		function result_button(){
       $id= $this->input->post('ids');
       $tambahan= $this->input->post('tambahan');

        $data['id']=$id;

        $data['tambahan']=$tambahan;
        $data['tanda']='compensation';
        
        $history=$this->HRD_model->get_compensation_id($id);
        /*
        $this->load->view('hrd/result_button',$data);
        */
         foreach($history as $to){
         	echo $to->reason;
         }

    }


    public function aksi_pegawai(){

       $id_pegawai= $this->input->post('id_pegawai');  
       $email= $this->input->post('email');
       $nama_pegawai= $this->input->post('nama_pegawai');
       $id_divisi= $this->input->post('id_divisi');  
       $id_jabatan= $this->input->post('id_jabatan'); 
       $id_provinsi_lahir= $this->input->post('id_provinsi_lahir');  
       $id_kota_lahir= $this->input->post('id_kota_lahir');  
       $status_pernikahan= $this->input->post('status_pernikahan');  
       $agama= $this->input->post('agama'); 
       $status_kewarganegaraan= $this->input->post('status_kewarganegaraan'); 
       $jenis_kelamin= $this->input->post('jenis_kelamin'); 
       $perusahaan= $this->input->post('perusahaan');
       $telepon= $this->input->post('telepon'); 
        $atasan_langsung= $this->input->post('atasan_langsung'); 
        $status_pegawai= $this->input->post('status_pegawai');
        $tanggal_masuk= $this->input->post('tanggal_masuk'); 
        $fte= $this->input->post('fte');
        $id= $this->input->post('id');

        if($id){
        $this->HRD_model->ubah_data_pegawai($id_pegawai,$nama_pegawai,$id_divisi,$id_jabatan,$id_provinsi_lahir,$id_kota_lahir,$status_pernikahan,$agama,$status_kewarganegaraan,$jenis_kelamin,$perusahaan,$telepon,$atasan_langsung,$status_pegawai,$tanggal_masuk,$fte,$id,$email);
             echo $this->session->set_flashdata('message', '<div class="alert alert-warning">Users berhasil diubah</div>');
         }else{

             $this->HRD_model->tambah_data_pegawai($id_pegawai,$nama_pegawai,$id_divisi,$id_jabatan,$id_provinsi_lahir,$id_kota_lahir,$status_pernikahan,$agama,$status_kewarganegaraan,$jenis_kelamin,$perusahaan,$telepon,$atasan_langsung,$status_pegawai,$tanggal_masuk,$fte,$email);
             echo $this->session->set_flashdata('message', '<div class="alert alert-warning">Users berhasil ditambah</div>');
         }
        redirect('hrd-detail-pekerjaan');
    }
	

}
