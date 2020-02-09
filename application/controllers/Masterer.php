<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterer extends CI_Controller {

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
        $this->load->model('Master_model');
        $this->load->library('excel');
    }
	
	//======================== Master Aturan ============================//
	public function aturan($offset=0)
    {

        $val = $this->input->get('val');
        $config['base_url'] = base_url().'Masterer/aturan';
        $config['total_rows'] = $this->Master_model->count_aturan();
        $config['per_page'] =2;
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =7;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] ='';
        $config['last_link'] = '';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $form = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['aturan'] = $this->Master_model->select_aturan();

        $ambil_as=$this->Master_model->select_aturan_request();
          foreach($ambil_as as $as){
            $id_request[]=$as->id_jenis_request;
          }

         

        $data['ambil_aturan']=$this->Master_model->select_aturan_ada($id_request);

     



        if($val){
            $data['aturan'] = $this->Master_model->select_aturan_val($val);
        }else{
            $data['aturan'] = $this->Master_model->select_aturan();
            $data['link']= $this->pagination->create_links();
        }
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/aturan_vw',$data);
        $this->load->view('layouts/footer');
    }
	//======================== End of Aturan ============================//
	
	//======================== Master Barang ============================//
	public function mst_barang($offset=0)
    {

        $val = $this->input->get('val');
        $config['base_url'] = base_url().'Master/mst_barang';
        $config['total_rows'] = $this->Master_model->count_kategori_barang();
        $config['per_page'] =2;
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =7;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] ='';
        $config['last_link'] = '';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $form = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['mst_barang'] = $this->Master_model->select_kategori_barang();
        if($val){
            $data['mst_barang'] = $this->Master_model->select_kategori_barang_val($val);
        }else{
            $data['mst_barang'] = $this->Master_model->select_kategori_barang($config['per_page'], $offset,$form);
            $data['link']= $this->pagination->create_links();
        }
        $this->load->view('layouts/header');
        $this->load->view('barang_vw',$data);
        $this->load->view('layouts/footer');
    }
	//======================== End of Barang ============================//
	
	//======================== Master Jenis Request ============================//
	public function mst_jenis_request($offset=0)
    {

        $val = $this->input->get('val');
        $config['base_url'] = base_url().'Masterer/mst_jenis_request';
        $config['total_rows'] = $this->Master_model->count_jenis_request();
        $config['per_page'] =10;
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =7;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] ='';
        $config['last_link'] = '';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $form = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['jenis_request'] = $this->Master_model->select_jenis_request();
        if($val){
            $data['jenis_request'] = $this->Master_model->select_jenis_request_val($val);
        }else{
            $data['jenis_request'] = $this->Master_model->select_jenis_request();
            $data['link']= $this->pagination->create_links();
        }
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/jenis_request_vw',$data);
        $this->load->view('layouts/footer');
    }




    public function kepala_regional(){

        $data['divisi']=$this->Master_model->select_divisi_kacab();
        $data['kepala_regional']=$this->Master_model->select_kepala_regional();

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/kepala_regional_vw',$data);
        $this->load->view('layouts/footer');
    }


    public function kategori(){
         /*
        $data['divisi']=$this->Master_model->select_divisi_kacab();
        $data['kepala_regional']=$this->Master_model->select_kepala_regional();
        */
        $data['kategori']=$this->Master_model->tampil_kategori();

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/kategori_vw',$data);
        $this->load->view('layouts/footer');
    }
    
	
	public function simpan_jenis_request(){

        $id_jenis_request      = $this->input->post('id_jenis_request');
        $jenis_request         = $this->input->post('jenis_request');
        if($id_jenis_request){
            // update jenis request //
            $this->Master_model->update_jenis_request($id_jenis_request,$jenis_request);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Ubah jenis request berhasil</div>');
        }else{
            // insert jenis request //
            $this->Master_model->insert_jenis_request($jenis_request);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Tambah jenis request  berhasil</div>');
        }
        redirect('Masterer/mst_jenis_request');
    }
	
	function hapus_jenis_request($id_jenis_request)
    {
        $this->Master_model->delete_jenis_request($id_jenis_request);
        echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Hapus kategori barang berhasil</div>');
        redirect('Masterer/mst_jenis_request');
    }
	//======================== End of Jenis Request ============================//
	
	//======================== Master Divisi =========================//
	public function divisi($offset=0)
    {

        $val = $this->input->get('val');
        $config['base_url'] = base_url().'Masterer/divisi';
        $config['total_rows'] = $this->Master_model->count_divisi();
        $config['per_page'] =10;
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =7;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] ='';
        $config['last_link'] = '';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $form = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['divisi'] = $this->Master_model->select_divisi();
        if($val){
            $data['divisi'] = $this->Master_model->select_divisi_val($val);
        }else{
            $data['divisi'] = $this->Master_model->select_divisi();
            $data['link']= $this->pagination->create_links();
        }
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/divisi_vw',$data);
        $this->load->view('layouts/footer');
    }


      public function master_barang($offset=0)
    {

        $val = $this->input->get('val');
        $config['base_url'] = base_url().'Masterer/master_barang';
        $config['total_rows'] = $this->Master_model->count_supplier();
        $config['per_page'] =10;
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =7;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] ='';
        $config['last_link'] = '';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
       /*
        $form = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['master_barang'] = $this->Master_model->select_supplier();
        if($val){
            $data['master_barang'] = $this->Master_model->select_supplier_val($val);
        }else{
            $data['master_barang'] = $this->Master_model->select_supplier();
            $data['link']= $this->pagination->create_links();
        }
        */
        $data['kategori_produk']=$this->Master_model->select_kategori_non_dagang();
        $data['produk']=$this->Master_model->select_produk();
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/mst_barang_vw',$data);
        $this->load->view('layouts/footer');
    }
	
	public function simpan_divisi(){

        $id_divisi      = $this->input->post('id_divisi');
        $nama_divisi    = $this->input->post('nama_divisi');
        $id_kacab_regional    = $this->input->post('id_kacab_regional');
     


        if($id_divisi){
            // update jenis request //
            $this->Master_model->update_divisi($id_divisi,$nama_divisi,$id_kacab_regional);
            
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Ubah kategori barang berhasil</div>');
        }else{
            // insert jenis request //
            $this->Master_model->insert_divisi($nama_divisi);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Tambah Divisi Pegawai berhasil</div>');
        }

        if($id_kacab_regional){
       redirect('Masterer/kepala_regional');
        }else{
        redirect('Masterer/divisi');
       }
    }
	
	function hapus_divisi($id_divisi)
    {
        $this->Master_model->delete_divisi($id_divisi);
        echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Hapus Divisi Pegawai berhasil</div>');
        redirect('Masterer/divisi');
    }
	//======================== End of Master Divisi =========================//
	
	//========================== Master of Jabatan ==========================//
	public function jabatan($offset=0)
    {

        $val = $this->input->get('val');
        $config['base_url'] = base_url().'Masterer/jabatan';
        $config['total_rows'] = $this->Master_model->count_jabatan();
        $config['per_page'] =10;
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =7;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] ='';
        $config['last_link'] = '';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $form = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['jabatan'] = $this->Master_model->select_jabatan();
        if($val){
            $data['jabatan'] = $this->Master_model->select_jabatan_val($val);
        }else{
            $data['jabatan'] = $this->Master_model->select_jabatan();
            $data['link']= $this->pagination->create_links();
        }
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/jabatan_vw',$data);
        $this->load->view('layouts/footer');
    }
	
	public function simpan_jabatan(){

        $id_jabatan      = $this->input->post('id_jabatan');
        $nama_jabatan    = $this->input->post('nama_jabatan');
        if($id_jabatan){
            // update jenis request //
            $this->Master_model->update_jabatan($id_jabatan,$nama_jabatan);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Ubah jabatan berhasil</div>');
        }else{
            // insert jenis request //
            $this->Master_model->insert_jabatan($nama_jabatan);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Tambah jabatan berhasil</div>');
        }
        redirect('Masterer/jabatan');
    }


    public function simpan_syarat_pembayaran(){

        $nama_syarat_pembayaran    = $this->input->post('nama_syarat_pembayaran');
        $jangka_waktu              = $this->input->post('jangka_waktu');
        $id_syarat_pembayaran              = $this->input->post('id_syarat_pembayaran');

        if($id_syarat_pembayaran){
            // update jenis request //
            $this->Master_model->update_syarat_pembayaran($id_syarat_pembayaran,$nama_syarat_pembayaran,$jangka_waktu);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Ubah jabatan berhasil</div>');
        }else{
            // insert jenis request //
            $this->Master_model->insert_syarat_pembayaran($nama_syarat_pembayaran,$jangka_waktu);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Tambah Syarat Pembayaran berhasil</div>');
        }
        redirect('Masterer/syarat_pembayaran');
    }
    
	
	function hapus_jabatan($id_jabatan)
    {
        $this->Master_model->delete_jabatan($id_jabatan);
        echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Hapus jabatan berhasil </div>');
        redirect('Masterer/jabatan');
    }
	//======================== End of Master of Jabatan =========================//
	
    //====================================== Master barang ======================================//

    public function barang($offset=0)
    {

        $val = $this->input->get('val');
        $config['base_url'] = base_url().'Master/barang';
        $config['total_rows'] = $this->Master_model->count_barang();
        $config['per_page'] =2;
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =7;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] ='';
        $config['last_link'] = '';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $form = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['barang'] = $this->Master_model->select_barang();
        if($val){
            $data['barang'] = $this->Master_model->select_barang_val($val);
        }else{
            $data['barang'] = $this->Master_model->select_barang($config['per_page'], $offset,$form);
            $data['link']= $this->pagination->create_links();
        }
        $this->load->view('layouts/header');
        $this->load->view('barang_vw',$data);
        $this->load->view('layouts/footer');
    }
	
	//====================================== Master barang detail ======================================//

    public function barang_detail($offset=0)
    {
		$id_barang = $this->input->get('id_barang');
        $val = $this->input->get('val');
        $config['base_url'] = base_url().'Masterer/barang_detail?id_barang='.$id_barang.'/';
        $config['total_rows'] = $this->Master_model->count_barang_detail($id_barang);
        $config['per_page'] =2;
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =7;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] ='';
        $config['last_link'] = '';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		
		$data['id_barang'] = $id_barang;
		
        $form = $this->uri->segment(3);
        $this->pagination->initialize($config);
		$data['barang'] = $this->Master_model->select_barang();
        $data['barang_detail'] = $this->Master_model->select_barang_detail($id_barang);
        if($val){
            $data['barang_detail'] = $this->Master_model->select_barang_detail_val($val);
        }else{
            $data['barang_detail'] = $this->Master_model->select_barang_detail($id_barang,$config['per_page'], $offset,$form);
            $data['link']= $this->pagination->create_links();
        }
        $this->load->view('layouts/header');
        $this->load->view('barang_detail_vw',$data);
        $this->load->view('layouts/footer');
    }
	
	public function simpan_barang_detail(){

        $id_barang_detail   = $this->input->post('id_barang_detail');
        $id_barang          = $this->input->post('id_barang');
        $nama      			= $this->input->post('nama');
        $spesifikasi      	= $this->input->post('spesifikasi');
        $keterangan      	= $this->input->post('keterangan');
        $harga_barang      	= $this->input->post('harga_barang');
        $tanggal_input      = $this->input->post('tanggal_input');

        if($id_barang_detail){
            // update subkategori barang //
            $this->Master_model->update_barang_detail($id_barang,$nama,$spesifikasi,$keterangan,$harga_barang,$tanggal_input,$id_barang_detail);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Ubah detail barang berhasil</div>');
        }else{
            // insert subkategori barang //
            $this->Master_model->insert_barang_detail($id_barang,$nama,$spesifikasi,$keterangan,$harga_barang,$tanggal_input);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Tambah detail barang berhasil</div>');
        }
        redirect('Masterer/barang_detail?id_barang='.$id_barang);
    }
	
	function hapus_barang_detail()
    {

        $id_barang_detail     = $this->input->get('id_barang_detail');
        $id_barang        = $this->input->get('id_barang');
        $this->Master_model->delete_barang_detail($id_barang_detail);
        echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Hapus detail barang berhasil</div>');
        redirect('Masterer/barang_detail?id_barang='.$id_barang);
    }
	
    //====================================== sub jenis request ======================================//

    public function subjenisrequest($offset=0)
    {

        $id_jenis_request = $this->input->get('id_jenis_request');
        $val = $this->input->get('val');
        $config['base_url'] = base_url().'Master/subjenisrequest?id_jenis_request='.$id_jenis_request.'/';
        $config['total_rows'] = $this->Master_model->count_subjenisrequest($id_jenis_request);
        $config['per_page'] =50;
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =7;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] ='';
        $config['last_link'] = '';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $data['id_jenis_request'] = $id_jenis_request;

        $form = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['barang'] = $this->Master_model->select_barang();
        $data['subjenisrequest'] = $this->Master_model->select_subjenisrequest_barang($id_jenis_request);
        if($val){
            $data['subjenisrequest'] = $this->Master_model->select_subjenisrequest_barang_val($val);
        }else{
            $data['subjenisrequest'] = $this->Master_model->select_subjenisrequest_barang($id_jenis_request,$config['per_page'], $offset,$form);
            $data['link']= $this->pagination->create_links();
        }
        $this->load->view('layouts/header');
        $this->load->view('subjenisrequest_vw',$data);
        $this->load->view('layouts/footer');
    }


    //====================================== lokasi barang ======================================//

    public function lokasi($offset=0)
    {

        $val = $this->input->get('val');
        $config['base_url'] = base_url().'Master/lokasi';
        $config['total_rows'] = $this->Master_model->count_lokasi();
        $config['per_page'] =2;
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =7;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] ='';
        $config['last_link'] = '';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $form = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['lokasi'] = $this->Master_model->select_lokasi();
        if($val){
            $data['lokasi'] = $this->Master_model->select_lokasi_val($val);
        }else{
            $data['lokasi'] = $this->Master_model->select_lokasi($config['per_page'], $offset,$form);
            $data['link']= $this->pagination->create_links();
        }
        $this->load->view('layouts/header');
        $this->load->view('lokasi_vw',$data);
        $this->load->view('layouts/footer');
    }

	//====================================== Supplier ======================================//

    public function supplier($offset=0)
    {

        $val = $this->input->get('val');
        $config['base_url'] = base_url().'Masterer/supplier';
        $config['total_rows'] = $this->Master_model->count_supplier();
        $config['per_page'] =10;
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =7;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] ='';
        $config['last_link'] = '';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $form = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['supplier'] = $this->Master_model->select_supplier();
        if($val){
            $data['supplier'] = $this->Master_model->select_supplier_val($val);
        }else{
            $data['supplier'] = $this->Master_model->select_supplier();
            $data['link']= $this->pagination->create_links();
        }
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/supplier_vw',$data);
        $this->load->view('layouts/footer');
    }

     public function gudang($offset=0)
    {

        $val = $this->input->get('val');
        $config['base_url'] = base_url().'Masterer/gudang';
        $config['total_rows'] = $this->Master_model->count_supplier();
        $config['per_page'] =10;
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =7;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] ='';
        $config['last_link'] = '';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $form = $this->uri->segment(3);
        $this->pagination->initialize($config);
        /*
        $data['gudang'] = $this->Master_model->select_supplier();
        if($val){
            $data['gudang'] = $this->Master_model->select_supplier_val($val);
        }else{
            $data['gudang'] = $this->Master_model->select_supplier();
            $data['link']= $this->pagination->create_links();
        }*/
        $data['gudang']=$this->Master_model->select_gudang();
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/gudang_vw',$data);
        $this->load->view('layouts/footer');
    }


      public function pajak($offset=0)
    {

        $val = $this->input->get('val');
        $config['base_url'] = base_url().'Masterer/pajak';
        $config['total_rows'] = $this->Master_model->count_supplier();
        $config['per_page'] =10;
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =7;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] ='';
        $config['last_link'] = '';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $form = $this->uri->segment(3);
        $this->pagination->initialize($config);
        /*
        $data['pajak'] = $this->Master_model->select_supplier();
        if($val){
            $data['pajak'] = $this->Master_model->select_supplier_val($val);
        }else{
            $data['pajak'] = $this->Master_model->select_supplier();
            $data['link']= $this->pagination->create_links();
        }
        */

        $data['pajak']=$this->Master_model->select_pajak();
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/pajak_vw',$data);
        $this->load->view('layouts/footer');
    }
    
    //====================================== Master Barang ======================================//

//=============================================================================================================== simpan dan update

    //===========================================insert dan update kategori barang =================================//

    public function simpan_kategori(){

        $id_kategori           = $this->input->post('id_kategori');
        $kode_kategori         = $this->input->post('kode_kategori');
        $nama_kategori         = $this->input->post('nama_kategori');
        if($id_kategori){
            // update kategori barang //
            $this->Master_model->update_kategori_barang($id_kategori,$nama_kategori,$kode_kategori);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Ubah kategori barang berhasil</div>');
        }else{
            // insert kategori barang //
            $this->Master_model->insert_kategori_barang($kode_kategori,$nama_kategori);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Tambah kategori barang berhasil</div>');
        }
        redirect('Master/kategori');
    }
	
	//===========================================insert dan update aturan =================================//

    public function simpan_aturan(){

        $id_aturan                = $this->input->post('id_aturan');
        $id_jenis_request          = $this->input->post('id_jenis_request');
        $nama_aturan        = $this->input->post('nama_aturan');
        $batas_bawah        = $this->input->post('batas_bawah');
        $batas_atas         = $this->input->post('batas_atas');
        $status             = $this->input->post('status');

        if($id_aturan){
            // update kategori barang //
            $this->Master_model->update_aturan($id_aturan,$nama_aturan,$batas_bawah,$batas_atas,$status);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Ubah aturan berhasil</div>');
        }else{
            // insert kategori barang //
            $this->Master_model->insert_aturan($nama_aturan,$batas_bawah,$batas_atas,$status,$id_jenis_request);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Tambah aturan berhasil</div>');
        }
		
        redirect('Masterer/aturan');
    }

    //===========================================insert dan update satuan barang =================================//

    public function simpan_satuan(){

        $id_satuan          = $this->input->post('id_satuan');
        $satuan             = $this->input->post('satuan');

        if($id_satuan){
            // update kategori barang //
            $this->Master_model->update_satuan_barang($id_satuan,$satuan);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Ubah satuan barang berhasil</div>');
        }else{
            // insert kategori barang //
            $this->Master_model->insert_satuan_barang($satuan);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Tambah satuan barang berhasil</div>');
        }
        redirect('Master/satuan');
    }

    //===========================================insert dan update subkategori barang =================================//

    public function simpan_subkategori(){

        $id_subkategori        = $this->input->post('id_subkategori');
        $id_kategori           = $this->input->post('id_kategori');
        $nama_subkategori      = $this->input->post('nama_subkategori');

        if($id_subkategori){
            // update subkategori barang //
            $this->Master_model->update_subkategori_barang($id_kategori,$nama_subkategori,$id_subkategori);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Ubah Sub kategori barang berhasil</div>');
        }else{
            // insert subkategori barang //
            $this->Master_model->insert_subkategori_barang($id_kategori,$nama_subkategori);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Tambah Sub kategori barang berhasil</div>');
        }
        redirect('Master/subkategori?id_kategori='.$id_kategori);
    }

    //===========================================insert dan update status barang =================================//

    public function simpan_status(){

        $id_status        = $this->input->post('id_status');
        $status           = $this->input->post('status');
        if($id_status){
            // update status barang //
            $this->Master_model->update_status_barang($id_status,$status);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Ubah status barang berhasil</div>');
        }else{
            // insert status barang //
            $this->Master_model->insert_status_barang($status);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Tambah status barang berhasil</div>');
        }
        redirect('Master/status_barang');
    }


    //===========================================insert dan update merk barang =================================//

    public function simpan_merk(){

        $id_merk      = $this->input->post('id_merk');
        $nama_merk    = $this->input->post('nama_merk');

        if($id_merk){

            $this->Master_model->update_merk($id_merk,$nama_merk);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Ubah merk barang berhasil</div>');
        }else{

            $this->Master_model->insert_merk($nama_merk);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Tambah merk barang berhasil</div>');
        }
            redirect('Master/merk');
    }


    public function simpan_produk(){

        $kode_produk     = $this->input->post('kode_produk');
        $nama_barang     = $this->input->post('nama_barang');
        $qty             = $this->input->post('qty');
        $unit            = $this->input->post('unit');
        $harga_beli      = $this->input->post('harga_beli');
        $harga_jual      = $this->input->post('harga_jual');
        $kategori_produk = $this->input->post('kategori_produk');
        $id_barang       = $this->input->post('id_barang');   
    
        if($id_barang){

            $this->Master_model->insert_produk($kode_produk,$nama_barang,$qty,$unit,$harga_beli,$harga_jual,$kategori_produk,$id_barang,'ubah');
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Ubah produk berhasil</div>');
        }else{

            $this->Master_model->insert_produk($kode_produk,$nama_barang,$qty,$unit,$harga_beli,$harga_jual,$kategori_produk,'','tambah');
            

            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Tambah produk berhasil</div>');
        }
            redirect('Masterer/master_barang');
    }
	
	public function simpan_supplier(){

        $id_supplier      = $this->input->post('id_supplier');
        $nama_supplier    = $this->input->post('nama_supplier');
        $alamat_supplier    = $this->input->post('alamat_supplier');
        $email    			= $this->input->post('email');
        if($id_supplier){
            // update jenis request //
            $this->Master_model->update_supplier($id_supplier, $nama_supplier, $alamat_supplier, $email);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Ubah supplier berhasil</div>');
        }else{
            // insert jenis request //
            $this->Master_model->insert_supplier($nama_supplier, $alamat_supplier, $email);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Tambah supplier berhasil</div>');
        }
        redirect('Masterer/supplier');
    }


    public function simpan_gudang(){

        $id_gudang          = $this->input->post('id_gudang');
        $nama_gudang        = $this->input->post('nama_gudang');
        $kode_gudang        = $this->input->post('kode_gudang');
        $alamat             = $this->input->post('alamat');
        $keterangan             = $this->input->post('keterangan');

        if($id_gudang){
            // update jenis request //
            $this->Master_model->update_gudang($nama_gudang, $kode_gudang, $alamat,$keterangan,$id_gudang);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Ubah gudang berhasil</div>');
        }else{
            // insert jenis request //
            $this->Master_model->insert_gudang($nama_gudang, $kode_gudang, $alamat,$keterangan);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Tambah Gudang berhasil</div>');
        }
        redirect('Masterer/gudang');
    }


    public function simpan_pajak(){

        $nama_pajak                = $this->input->post('nama_pajak');
        $persentase_efektif        = $this->input->post('persentase_efektif');
        $cek_pemotongan            = $this->input->post('cek_pemotongan');
        $status                    = $this->input->post('status');
        $id_pajak                  = $this->input->post('id_pajak');
       

     


        if($id_pajak){
            // update jenis request //
            $this->Master_model->update_pajak($nama_pajak, $persentase_efektif,$id_pajak);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Ubah pajak berhasil</div>');
        }else{
            // insert jenis request //


            if($cek_pemotongan==on || $cek_pemotongan=="on"){

                $status_pemotongan==1;
            }else{
                $status_pemotongan==2;
            }

             $data    = array('status' => $status
             );
             $this->db->insert('mst_pajak',$data);
            $cek_id_terakhir=$this->Master_model->cek_id_terakhir();



            $this->Master_model->insert_pajak($nama_pajak,$persentase_efektif,$status_pemotongan,$cek_id_terakhir);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Tambah Pajak berhasil</div>');
        }
        redirect('Masterer/pajak');
    }
//================================================================================================================================== hapus
	//===========================================hapus aturan =================================//

    function hapus_aturan($id_aturan)
    {
        $this->Master_model->delete_aturan($id_aturan);
        echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Hapus aturan berhasil</div>');
        redirect('Masterer/aturan');
    }
	
    //===========================================hapus kategori barang =================================//

    function hapus_kategori_barang($id_kategori)
    {
        $this->Master_model->delete_kategori_barang($id_kategori);
        echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Hapus kategori barang berhasil</div>');
        redirect('Master/kategori');
    }

    //===========================================hapus satuan barang =================================//
    function hapus_satuan_barang($id_satuan)
    {
        $this->Master_model->delete_satuan_barang($id_satuan);
        echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Hapus satuan barang berhasil</div>');
        redirect('Master/satuan');
    }

    //===========================================hapus status barang =================================//

    function hapus_status_barang($id_status)
    {
        $this->Master_model->delete_status_barang($id_status);
        echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Hapus status barang berhasil</div>');
        redirect('Master/status_barang');
    }

    //===========================================hapus subkategori barang =================================//
    function hapus_subkategori_barang()
    {

        $id_subkategori        = $this->input->get('id_subkategori');
        $id_kategori        = $this->input->get('id_kategori');
        $this->Master_model->delete_subkategori_barang($id_kategori);
        echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Hapus kategori barang berhasil</div>');
        redirect('Master/kategori');
    }

    function hapus_merk($id_merk)
    {
        $this->Master_model->delete_merk($id_merk);
        echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Hapus merk barang berhasil</div>');
        redirect('Master/merk');
    }

    function hapus_supplier($id_supplier)
    {
        $this->Master_model->delete_supplier($id_supplier);
        echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Hapus Supplier berhasil</div>');
        redirect('Masterer/supplier');
    }


    function hapus_lokasi($id_lokasi)
    {
        $this->Master_model->delete_lokasi($id_lokasi);
        echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Hapus lokasi berhasil</div>');
        redirect('Master/lokasi');
    }

    function hapus_produk($id_barang){

        $this->Master_model->delete_produk($id_barang);
        echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Hapus produk berhasil</div>');
        redirect('Masterer/master_barang');
    }


     function hapus_syarat_pembayaran($id_syarat){

        $this->Master_model->delete_syarat_pembayaran($id_syarat);
        echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Hapus Syarat Pembayaran berhasil</div>');
        redirect('Masterer/syarat_pembayaran');
    }


     function hapus_gudang($id_gudang){

        $this->Master_model->delete_gudang($id_gudang);
        echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Hapus Gudang berhasil</div>');
        redirect('Masterer/gudang');
    }


     public function import_supplier()
    {

                    if(isset($_FILES["file"]["name"]))
                        {

                            $path = $_FILES["file"]["tmp_name"];
                            $object = PHPExcel_IOFactory::load($path);
                            foreach($object->getWorksheetIterator() as $worksheet)
                            {
                                $highestRow = $worksheet->getHighestRow();
                                $highestColumn = $worksheet->getHighestColumn();
                                for($row=2; $row<=$highestRow; $row++)
                                {   
                                    $nama_supplier = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                                    $alamat_supplier = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                                    $email      = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                                   
                                   
            
                                    
                                    
                                    if($nama_supplier){
                                    $data = array(
                                        'nama_supplier'        =>    $nama_supplier,
                                        'alamat_supplier'      =>    $alamat_supplier,
                                        'email'                =>    $email
                                    );
                                  }
                                   

                                }
                                 $this->db->insert_batch('supplier', $data);

                            }
                            
                           
                            
                            
                        }     


                        redirect ('Masterer/supplier');           
    
    }


     public function import_produk()
    {

                    if(isset($_FILES["file"]["name"]))
                        {

                            $path = $_FILES["file"]["tmp_name"];
                            $object = PHPExcel_IOFactory::load($path);
                            foreach($object->getWorksheetIterator() as $worksheet)
                            {
                                $highestRow = $worksheet->getHighestRow();
                                $highestColumn = $worksheet->getHighestColumn();
                                for($row=2; $row<=$highestRow; $row++)
                                {   
                                    $kode_produk = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                                    $nama_barang = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                                    $qty      = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                                    $unit      = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                                    $harga_beli      = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                                   
                                    $harga_jual      = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                                    $nama_pajak_beli      = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                                    $nama_pajak_jual      = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                                    $kategori_produk      = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
            
                                    
            
                                    
                                    
                                    
                                    $data[] = array(
                                        'kode_produk  '        =>    $kode_produk,
                                        'nama_barang'          =>    $nama_barang,
                                        'qty'                  =>    $qty,
                                        'unit'                 =>    $unit,
                                        'harga_beli'           =>    $harga_beli,
                                        'harga_jual'           =>    $harga_jual,
                                        'nama_pajak_beli'      =>    $nama_pajak_beli,
                                        'nama_pajak_jual'      =>    $nama_pajak_jual,
                                        'kategori_produk'      =>    $kategori_produk
                                    );
                                  /*
                                   $this->Master_model->input_data($data,'mst_barang');
                                   */

                                }
                                $this->db->insert_batch('mst_barang', $data);
                              

                            }
                            
                           
                            
                            
                        }     


                        redirect ('Masterer/supplier');           
    
    }




   public function import_syarat_pembayaran()
    {

                    if(isset($_FILES["file"]["name"]))
                        {

                            $path = $_FILES["file"]["tmp_name"];
                            $object = PHPExcel_IOFactory::load($path);
                            foreach($object->getWorksheetIterator() as $worksheet)
                            {
                                $highestRow = $worksheet->getHighestRow();
                                $highestColumn = $worksheet->getHighestColumn();
                                for($row=2; $row<=$highestRow; $row++)
                                {   
                                    $nama_syarat_pembayaran = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                                    $jangka_waktu = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                                    /*
                                    echo $nama_syarat_pembayaran;
                                    echo "<br>";
                                    echo $jangka_waktu;
                                    die;
*/
            
                                    
                                    
                                    
                                    $data[] = array(
                                        'nama_syarat_pembayaran'        =>    $nama_syarat_pembayaran,
                                        'jangka_waktu'      =>    $jangka_waktu
                                    );
                                  
                                   

                                }
                                 $this->db->insert_batch('mst_syarat_pembayaran', $data);
                                 


                            }
                            
                           
                            
                            
                        }     


                        redirect ('Masterer/syarat_pembayaran');           
    
    }


    public function import_gudang()
    {

                    if(isset($_FILES["file"]["name"]))
                        {

                            $path = $_FILES["file"]["tmp_name"];
                            $object = PHPExcel_IOFactory::load($path);
                            foreach($object->getWorksheetIterator() as $worksheet)
                            {
                                $highestRow = $worksheet->getHighestRow();
                                $highestColumn = $worksheet->getHighestColumn();
                                for($row=2; $row<=$highestRow; $row++)
                                {   
                                    $nama_gudang = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                                    $kode_gudang = $worksheet->getCellByColumnAndRow(1, $row)->getValue();

                                    $alamat = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                                    $keterangan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                                    /*
                                    echo $nama_syarat_pembayaran;
                                    echo "<br>";
                                    echo $jangka_waktu;
                                    die;
*/
            
                                    
                                    
                                    
                                    $data[] = array(
                                        'nama'        =>    $nama_gudang,
                                        'kode'        =>    $kode_gudang,
                                        'alamat'        =>    $alamat,
                                        'keterangan'      =>    $keterangan
                                    );
                                  
                                   

                                }
                                 $this->db->insert_batch('mst_gudang', $data);
                                 


                            }
                            
                           
                            
                            
                        }     


                        redirect ('Masterer/gudang');           
    
    }



   function export_supplier(){

    include APPPATH.'third_party/PHPExcel/PHPExcel1.php';
    
    // Panggil class PHPExcel nya
    $csv = new PHPExcel();

    // Settingan awal fil excel
    $csv->getProperties()->setCreator('PT Aarti Jaya')
                 ->setLastModifiedBy('PT Aarti Jaya')
                 ->setTitle("PT Aarti Jaya")
                 ->setSubject("PT Aarti Jaya")
                 ->setDescription("PT Aarti Jaya")
                 ->setKeywords("PT Aarti Jaya");

    // Buat header tabel nya pada baris ke 1
    $csv->setActiveSheetIndex(0)->setCellValue('A1', "Nama Supplier"); // Set kolom A1 dengan tulisan "NO"
    $csv->setActiveSheetIndex(0)->setCellValue('B1', "Alamat Supplier");
    $csv->setActiveSheetIndex(0)->setCellValue('C1', "Email");
    
    $siswa = $this->Master_model->select_supplier();

    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa

      $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->nama_supplier);
      $csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->alamat_supplier);
      $csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->email);
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }

    // Set orientasi kertas jadi LANDSCAPE
    $csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

    // Set judul file excel nya
    $csv->getActiveSheet(0)->setTitle("supplier");
    $csv->setActiveSheetIndex(0);

    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="supplier.csv"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');

    $write = new PHPExcel_Writer_CSV($csv);
    $write->save('php://output');
   }

   function export_gudang(){

    include APPPATH.'third_party/PHPExcel/PHPExcel1.php';
    
    // Panggil class PHPExcel nya
    $csv = new PHPExcel();

    // Settingan awal fil excel
    $csv->getProperties()->setCreator('PT Aarti Jaya')
                 ->setLastModifiedBy('PT Aarti Jaya')
                 ->setTitle("PT Aarti Jaya")
                 ->setSubject("PT Aarti Jaya")
                 ->setDescription("PT Aarti Jaya")
                 ->setKeywords("PT Aarti Jaya");

    // Buat header tabel nya pada baris ke 1
    $csv->setActiveSheetIndex(0)->setCellValue('A1', "Nama Gudang"); // Set kolom A1 dengan tulisan "NO"
    $csv->setActiveSheetIndex(0)->setCellValue('B1', "Kode Gudang");
    $csv->setActiveSheetIndex(0)->setCellValue('C1', "Alamat");
    $csv->setActiveSheetIndex(0)->setCellValue('D1', "Keterangan");
    
    $siswa = $this->Master_model->select_gudang();

    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa

      $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->nama);
      $csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->kode);
      $csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->alamat);
      $csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->keterangan);
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }

    // Set orientasi kertas jadi LANDSCAPE
    $csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

    // Set judul file excel nya
    $csv->getActiveSheet(0)->setTitle("supplier");
    $csv->setActiveSheetIndex(0);

    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="gudang.csv"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');

    $write = new PHPExcel_Writer_CSV($csv);
    $write->save('php://output');
   }





    function export_syarat_pembayaran(){

    include APPPATH.'third_party/PHPExcel/PHPExcel1.php';
    
    // Panggil class PHPExcel nya
    $csv = new PHPExcel();

    // Settingan awal fil excel
    $csv->getProperties()->setCreator('PT Aarti Jaya')
                 ->setLastModifiedBy('PT Aarti Jaya')
                 ->setTitle("PT Aarti Jaya")
                 ->setSubject("PT Aarti Jaya")
                 ->setDescription("PT Aarti Jaya")
                 ->setKeywords("PT Aarti Jaya");

    // Buat header tabel nya pada baris ke 1
    $csv->setActiveSheetIndex(0)->setCellValue('A1', "Nama Syarat Pembayaran"); // Set kolom A1 dengan tulisan "NO"
    $csv->setActiveSheetIndex(0)->setCellValue('B1', "Jangka Waktu");
   
    
    $siswa = $this->Master_model->select_mst_pembayaran();

    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa

      $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->nama_syarat_pembayaran);
      $csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->jangka_waktu);
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }

    // Set orientasi kertas jadi LANDSCAPE
    $csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

    // Set judul file excel nya
    $csv->getActiveSheet(0)->setTitle("supplier");
    $csv->setActiveSheetIndex(0);

    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="syaratpembayaran.csv"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');

    $write = new PHPExcel_Writer_CSV($csv);
    $write->save('php://output');
   }
   
   

    function export_produk(){
    

    include APPPATH.'third_party/PHPExcel/PHPExcel1.php';
    
    // Panggil class PHPExcel nya
    $csv = new PHPExcel();

    // Settingan awal fil excel
    $csv->getProperties()->setCreator('PT Aarti Jaya')
                 ->setLastModifiedBy('PT Aarti Jaya')
                 ->setTitle("PT Aarti Jaya")
                 ->setSubject("PT Aarti Jaya")
                 ->setDescription("PT Aarti Jaya")
                 ->setKeywords("PT Aarti Jaya");

    // Buat header tabel nya pada baris ke 1
    $csv->setActiveSheetIndex(0)->setCellValue('A1', "Kode Produk"); // Set kolom A1 dengan tulisan "NO"
    $csv->setActiveSheetIndex(0)->setCellValue('B1', "Nama");
    $csv->setActiveSheetIndex(0)->setCellValue('C1', "Kuantitas");
    $csv->setActiveSheetIndex(0)->setCellValue('D1', "Satuan");
    $csv->setActiveSheetIndex(0)->setCellValue('E1', "Harga Beli");
    $csv->setActiveSheetIndex(0)->setCellValue('F1', "Harga Jual");
    $csv->setActiveSheetIndex(0)->setCellValue('G1', "Nama Pajak Beli");
    $csv->setActiveSheetIndex(0)->setCellValue('H1', "Nama Pajak Jual");
    $csv->setActiveSheetIndex(0)->setCellValue('I1', "Kategori Produk");
    
    $siswa = $this->Master_model->select_produk();

    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa

      $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->kode_produk);
      $csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_barang);
      $csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->qty);
      $csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->unit);
      $csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->harga_beli);
      $csv->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->harga_jual);
      $csv->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->nama_pajak_beli);
      $csv->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->nama_pajak_jual);
      $csv->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->kategori_produk);

      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }

    // Set orientasi kertas jadi LANDSCAPE
    $csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

    // Set judul file excel nya
    $csv->getActiveSheet(0)->setTitle("product");
    $csv->setActiveSheetIndex(0);

    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="product.csv"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');

    $write = new PHPExcel_Writer_CSV($csv);
    $write->save('php://output');
   }


    public function daftar_lainnya($offset=0)
    {

        $val = $this->input->get('val');
        $config['base_url'] = base_url().'Masterer/daftar_lainnya';
        $config['total_rows'] = $this->Master_model->count_supplier();
        $config['per_page'] =10;
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =7;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] ='';
        $config['last_link'] = '';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $form = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['daftar_lainnya'] = $this->Master_model->select_supplier();
        if($val){
            $data['daftar_lainnya'] = $this->Master_model->select_supplier_val($val);
        }else{
            $data['daftar_lainnya'] = $this->Master_model->select_supplier();
            $data['link']= $this->pagination->create_links();
        }
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/daftar_lainnya_vw',$data);
        $this->load->view('layouts/footer');
    }



    public function syarat_pembayaran($offset=0)
    {

        $val = $this->input->get('val');
        $config['base_url'] = base_url().'Masterer/syarat_pembayaran';
        $config['total_rows'] = $this->Master_model->count_supplier();
        $config['per_page'] =10;
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =7;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] ='';
        $config['last_link'] = '';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $form = $this->uri->segment(3);
        $this->pagination->initialize($config);
        /*
        $data['syarat_pembayaran'] = $this->Master_model->select_supplier();
        if($val){
            $data['syarat_pembayaran'] = $this->Master_model->select_supplier_val($val);
        }else{
            $data['syarat_pembayaran'] = $this->Master_model->select_supplier();
            $data['link']= $this->pagination->create_links();
        }*/

        $data['syarat_pembayaran']=$this->Master_model->select_mst_pembayaran();
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/syarat_pembayaran_vw',$data);
        $this->load->view('layouts/footer');
    }
    

}
