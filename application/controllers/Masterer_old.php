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
        if($val){
            $data['aturan'] = $this->Master_model->select_aturan_val($val);
        }else{
            $data['aturan'] = $this->Master_model->select_aturan($config['per_page'], $offset,$form);
            $data['link']= $this->pagination->create_links();
        }
        $this->load->view('layouts/header');
        $this->load->view('aturan_vw',$data);
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
            $data['jenis_request'] = $this->Master_model->select_jenis_request($config['per_page'], $offset,$form);
            $data['link']= $this->pagination->create_links();
        }
        $this->load->view('layouts/header');
        $this->load->view('jenis_request_vw',$data);
        $this->load->view('layouts/footer');
    }
	
	public function simpan_jenis_request(){

        $id_jenis_request      = $this->input->post('id_jenis_request');
        $jenis_request         = $this->input->post('jenis_request');
        if($id_jenis_request){
            // update jenis request //
            $this->Master_model->update_jenis_request($id_jenis_request,$jenis_request);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Ubah kategori barang berhasil</div>');
        }else{
            // insert jenis request //
            $this->Master_model->insert_jenis_request($jenis_request);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Tambah kategori barang berhasil</div>');
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
            $data['divisi'] = $this->Master_model->select_divisi($config['per_page'], $offset,$form);
            $data['link']= $this->pagination->create_links();
        }
        $this->load->view('layouts/header');
        $this->load->view('divisi_vw',$data);
        $this->load->view('layouts/footer');
    }
	
	public function simpan_divisi(){

        $id_divisi      = $this->input->post('id_divisi');
        $nama_divisi    = $this->input->post('nama_divisi');
        if($id_divisi){
            // update jenis request //
            $this->Master_model->update_divisi($id_divisi,$nama_divisi);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Ubah kategori barang berhasil</div>');
        }else{
            // insert jenis request //
            $this->Master_model->insert_divisi($nama_divisi);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Tambah kategori barang berhasil</div>');
        }
        redirect('Masterer/divisi');
    }
	
	function hapus_divisi($id_divisi)
    {
        $this->Master_model->delete_divisi($id_divisi);
        echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Hapus kategori barang berhasil</div>');
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
            $data['jabatan'] = $this->Master_model->select_jabatan($config['per_page'], $offset,$form);
            $data['link']= $this->pagination->create_links();
        }
        $this->load->view('layouts/header');
        $this->load->view('jabatan_vw',$data);
        $this->load->view('layouts/footer');
    }
	
	public function simpan_jabatan(){

        $id_jabatan      = $this->input->post('id_jabatan');
        $nama_jabatan    = $this->input->post('nama_jabatan');
        if($id_jabatan){
            // update jenis request //
            $this->Master_model->update_jabatan($id_jabatan,$nama_jabatan);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Ubah kategori barang berhasil</div>');
        }else{
            // insert jenis request //
            $this->Master_model->insert_jabatan($nama_jabatan);
            echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Tambah kategori barang berhasil</div>');
        }
        redirect('Masterer/jabatan');
    }
	
	function hapus_jabatan($id_jabatan)
    {
        $this->Master_model->delete_jabatan($id_jabatan);
        echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Hapus kategori barang berhasil</div>');
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

        $id_aturan          = $this->input->post('id_aturan');
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
            $this->Master_model->insert_aturan($nama_aturan,$batas_bawah,$batas_atas,$status);
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
        redirect('Master/supplier');
    }


    function hapus_lokasi($id_lokasi)
    {
        $this->Master_model->delete_lokasi($id_lokasi);
        echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-block"><button type="button" class="close" data-dismiss="alert">×</button> Hapus lokasi berhasil</div>');
        redirect('Master/lokasi');
    }


}
