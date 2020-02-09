<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

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

        $this->load->model('Pengajuan_model');
        $this->load->model('Manager_model');
        $this->load->model('Email_model');
        $this->load->model('Finance_model');
        $this->load->model('Purchasing_model');
        $this->load->model('General_model');
        $this->load->library('cart');
        $this->load->library('session');
    }

	public function index()
	{
        $this->load->view('layouts/header');
	    $this->load->view('dashboard');
        $this->load->view('layouts/footer');
	}

    public function kotak_masuk($offset=0)
    {
        $search = $this->input->get('search');

        $ID = $this->ion_auth->user()->row()->id;
        $cek_divisi=$this->Manager_model->cek_divisi($ID);
        foreach($cek_divisi as $div){
            $id_divisi=$div->id_divisi;
        }
        $data['users']=$this->Email_model->select_users();
        $data['pengajuan_by_divisi']=$this->Manager_model->select_pengajuan_by_divisi($id_divisi);
 $data['total_email_masuk']=$this->Email_model->total_email_masuk_id($ID);

        $this->load->helper('url');
        $this->load->library('pagination');
        $config['base_url'] = base_url().'kotak-masuk';
        $config['total_rows'] = $this->Email_model->total_email_masuk_id($ID);
        $config['per_page'] =10;
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =3;
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

        $form=$this->uri->segment(3);
        $this->pagination->initialize($config);
        if($search) {
            $data['email_masuk'] = $this->Email_model->select_email_masuk_id($ID, $search);
        }else {
            $data['email_masuk'] = $this->Email_model->select_email_masuk_id_paging($ID, $config['per_page'], $offset,$form);
            $data['link'] = $this->pagination->create_links();

        }



        $data['email_terkirim']=$this->Email_model->select_email_terkirim_id($ID);
        $this->load->view('layouts/header');
        $this->load->view('email/kotak_masuk_vw',$data);
        $this->load->view('layouts/footer');
    }


    public function email_terkirim()
    {
        $ID = $this->ion_auth->user()->row()->id;
        $cek_divisi=$this->Manager_model->cek_divisi($ID);
        foreach($cek_divisi as $div){
            $id_divisi=$div->id_divisi;
        }
        $data['users']=$this->Email_model->select_users();
        $data['pengajuan_by_divisi']=$this->Manager_model->select_pengajuan_by_divisi($id_divisi);
        $data['email_masuk']=$this->Email_model->select_email_masuk_id($ID);
        $data['email_terkirim']=$this->Email_model->select_email_terkirim_id($ID);
        $this->load->view('layouts/header');
        $this->load->view('email/email_terkirim_vw',$data);
        $this->load->view('layouts/footer');
    }


    public function detail_email($id)
    {

        $ID = $this->ion_auth->user()->row()->id;
        $cek_divisi=$this->Manager_model->cek_divisi($ID);
        foreach($cek_divisi as $div){
            $id_divisi=$div->id_divisi;
        }
        $data['users']=$this->Email_model->select_users();
        $data['pengajuan_by_divisi']=$this->Manager_model->select_pengajuan_by_divisi($id_divisi);
        $data['email_masuk']=$this->Email_model->select_email_masuk_id($ID);
        $data['email_terkirim']=$this->Email_model->select_email_terkirim_id($ID);
        $data['users']=$this->Email_model->select_users();
        $data['update_status_email']=$this->Email_model->update_status_email($id);
        $data['email_detail']=$this->Email_model->select_email_detail_id($id);

        $this->load->view('layouts/header');
        $this->load->view('email/mail_detail',$data);
        $this->load->view('layouts/footer');
    }

    public function kirim_email()
    {
        $id_pengirim= $this->ion_auth->user()->row()->id;
        $id_penerima=$this->input->post('id_penerima');

        $pisah = explode("|",$id_penerima);
        $email_penerima = $pisah[0];
        $user_penerima  = $pisah[1];
        $subjek=$this->input->post('subjek');
        $isi_email=$this->input->post('isi_email');
        $status_pesan=1;
        $tanggal=date('Y-m-d');



        $this->Email_model->insert_email($id_pengirim,$user_penerima,$email_penerima,$isi_email,$tanggal,$subjek,$status_pesan);
        $this->kirim_email_baru($id_pengirim,$id_penerima,$email_penerima,$isi_email,$tanggal,$subjek,$status_pesan);
        redirect('email-terkirim');
    }



    function kirim_email_baru($id_pengirim,$id_penerima,$email_penerima,$isi_email,$tanggal,$subjek,$status_pesan)
    {

        $cek_pengirim=$this->Email_model->cek_pengirim($id_pengirim);

        foreach($cek_pengirim as $cek){

            $data['first_name']=$cek->first_name;
            $data['last_name']=$cek->last_name;
        }



        $config = [
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'no-reply.bursasajadah@aartijaya.com',    // Ganti dengan email gmail kamu
            'smtp_pass' => 'burs4sasajadah',      // Password gmail kamu
            'smtp_port' => 465,
            'crlf' => "rn",
            'newline' => "rn"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        $data['no_pengajuan'] = $no_pengajuan;
        // Email dan nama pengirim
        $message = $this->load->view('email/email_baru', $data, TRUE);

        $this->email->from('no-reply@bursasajadah.com', 'PT Aarti Jaya');

        // Email penerima
        $this->email->to($email_penerima); // Ganti dengan email tujuan kamu

        // Lampiran email, isi dengan url/path file


        // Subject email
        $this->email->subject('Email Baru');

        // Isi email
        $this->email->message($message);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }

    }


    public function kotak_masuk2($offset=0)
    {
        $search = $this->input->get('search');

        $ID = $this->ion_auth->user()->row()->id;
        $cek_divisi=$this->Finance_model->cek_divisi($ID);
        foreach($cek_divisi as $div){
            $id_divisi=$div->id_divisi;
        }
        $data['users']=$this->Email_model->select_users();
        $data['pengajuan_by_divisi']=$this->Finance_model->select_pengajuan_by_divisi($id_divisi);
        $data['total_email_masuk']=$this->Email_model->total_email_masuk_id($ID);

        $this->load->helper('url');
        $this->load->library('pagination');
        $config['base_url'] = base_url().'kotak-masuk';
        $config['total_rows'] = $this->Email_model->total_email_masuk_id($ID);
        $config['per_page'] =10;
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =3;
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

        $form=$this->uri->segment(3);
        $this->pagination->initialize($config);
        if($search) {
            $data['email_masuk'] = $this->Email_model->select_email_masuk_id($ID, $search);
        }else {
            $data['email_masuk'] = $this->Email_model->select_email_masuk_id_paging($ID, $config['per_page'], $offset,$form);
            $data['link'] = $this->pagination->create_links();

        }

        $data['email_terkirim']=$this->Email_model->select_email_terkirim_id($ID);
        $this->load->view('layouts/header');
        $this->load->view('email/kotak_masuk_vw',$data);
        $this->load->view('layouts/footer');
    }

    //Kotak Masuk untuk Purchasing
    public function kotak_masuk3($offset=0)
    {
        $search = $this->input->get('search');

        $ID = $this->ion_auth->user()->row()->id;
        $cek_divisi=$this->Purchasing_model->cek_divisi($ID);
        foreach($cek_divisi as $div){
            $id_divisi=$div->id_divisi;
        }
        $data['users']=$this->Email_model->select_users();
        $data['pengajuan_by_divisi']=$this->Purchasing_model->select_pengajuan_by_divisi($id_divisi);
        $data['total_email_masuk']=$this->Email_model->total_email_masuk_id($ID);

        $this->load->helper('url');
        $this->load->library('pagination');
        $config['base_url'] = base_url().'kotak-masuk';
        $config['total_rows'] = $this->Email_model->total_email_masuk_id($ID);
        $config['per_page'] =10;
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =3;
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

        $form=$this->uri->segment(3);
        $this->pagination->initialize($config);
        if($search) {
            $data['email_masuk'] = $this->Email_model->select_email_masuk_id($ID, $search);
        }else {
            $data['email_masuk'] = $this->Email_model->select_email_masuk_id_paging($ID, $config['per_page'], $offset,$form);
            $data['link'] = $this->pagination->create_links();

        }

        $data['email_terkirim']=$this->Email_model->select_email_terkirim_id($ID);
        $this->load->view('layouts/header');
        $this->load->view('email/kotak_masuk_vw',$data);
        $this->load->view('layouts/footer');
    }

    //Kotak Masuk untuk General Manager
    public function kotak_masuk4($offset=0)
    {
        $search = $this->input->get('search');

        $ID = $this->ion_auth->user()->row()->id;
        $cek_divisi=$this->General_model->cek_divisi($ID);
        foreach($cek_divisi as $div){
            $id_divisi=$div->id_divisi;
        }
        $data['users']=$this->Email_model->select_users();
        $data['pengajuan_by_divisi']=$this->General_model->select_pengajuan_by_divisi($id_divisi);
        $data['total_email_masuk']=$this->Email_model->total_email_masuk_id($ID);

        $this->load->helper('url');
        $this->load->library('pagination');
        $config['base_url'] = base_url().'kotak-masuk';
        $config['total_rows'] = $this->Email_model->total_email_masuk_id($ID);
        $config['per_page'] =10;
        $config['use_page_numbers'] = false;
        $config['page_query_string'] = false;
        $config['enable_query_strings'] = true;
        $config['num_links'] =3;
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

        $form=$this->uri->segment(3);
        $this->pagination->initialize($config);
        if($search) {
            $data['email_masuk'] = $this->Email_model->select_email_masuk_id($ID, $search);
        }else {
            $data['email_masuk'] = $this->Email_model->select_email_masuk_id_paging($ID, $config['per_page'], $offset,$form);
            $data['link'] = $this->pagination->create_links();

        }

        $data['email_terkirim']=$this->Email_model->select_email_terkirim_id($ID);
        $this->load->view('layouts/header');
        $this->load->view('email/kotak_masuk_vw',$data);
        $this->load->view('layouts/footer');
    }

}
