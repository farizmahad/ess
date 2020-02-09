<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengajuan extends CI_Controller {

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
        $this->load->model('Pengajuan_model');
        $this->load->model('ion_auth_model');
        $this->load->library('cart');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->helper('download');
       
    }

	public function index()
	{	
		$ID = $this->ion_auth->user()->row()->id;
		$daterange=$this->input->get('daterange');
	    $data['count_persetujuan']=$this->Pengajuan_model->count_select_daftar_persetujuan($ID);
        $data['count_permintaan']=$this->Home_model->count_per_bel_selesai($ID,$daterange);
		
		$data['count_total']=$data['count_persetujuan']+$data['count_permintaan'];
		
        $this->load->view('layouts/header',$data);
	    $this->load->view('dashboard');
        $this->load->view('layouts/footer');
	}

   // Halaman Tambah permintaan Barang
    public function tambah_pengajuan()
    {
        $ID = $this->ion_auth->user()->row()->id;
        /*
        $select_divisi=$this->Pengajuan_model->select_divisi($ID);
        */
        $data['kodeunik'] = $this->Pengajuan_model->code_otomatis();
        $data['jenis_request']=$this->Pengajuan_model->select_jenis_request();
        $data['barang']=$this->Pengajuan_model->select_master_barang();
        $data['gedung']=$this->Pengajuan_model->select_master_gedung();
        $data['vendor']=$this->Pengajuan_model->select_master_vendor();
        $data['bank']=$this->Pengajuan_model->select_master_bank();

         $data['divisi']=$this->Pengajuan_model->select_master_divisi();

    
		$daterange=$this->input->get('daterange');
       

		$data['count_persetujuan']=$this->Pengajuan_model->count_select_daftar_persetujuan($ID);
        $data['count_permintaan']=$this->Home_model->count_per_bel_selesai($ID,$daterange);
		
		$data['count_total']=$data['count_persetujuan']+$data['count_permintaan'];
		
		$this->load->view('layouts/header',$data);
        
        $this->load->view('layouts/sidebar');


        $this->load->view('staff/tambah_pengajuan_vw',$data);
        $this->load->view('layouts/footer');
    }


   // Function memaasukkan barang ke dalam keranjang
/*
    function add(){

        $id_vendor=$this->input->post('id_vendor');
        $pecah = explode("|", $id_vendor);
        $hasil1 = $pecah[0];
        $hasil2 = $pecah[1];



       $data['kodeunik'] = $this->Pengajuan_model->code_otomatis();
       $data['jenis_request']=$this->Pengajuan_model->select_jenis_request();
       $data['barang']=$this->Pengajuan_model->select_master_barang();
       $data['gedung']=$this->Pengajuan_model->select_master_gedung();
       $data['vendor']=$this->Pengajuan_model->select_master_vendor();

        $this->form_validation->set_rules('id_barang','Id Barang','required');
            $this->form_validation->set_rules('nama_barang','Nama Barang','required');
            $this->form_validation->set_rules('qty','Jumlah Barang','required');
            $this->form_validation->set_rules('harga','Harga Barang','required');
            $this->form_validation->set_rules('id_vendor','Vendor','required');

 
      if($this->form_validation->run() != false){

           $member=$this->input->post('member');
           if($member==on){
            $nama_vendor=$this->input->post('nama_vendor');

           }else{

           
             $data=array(
            'id'=>$this->input->post('id_barang'),
            'name'=>$this->input->post('nama_barang'),
            'qty'=>$this->input->post('qty'),
            'price'=>$this->input->post('harga'),
            'keterangan'=>$this->input->post('keterangan'),
            'id_vendor'=>$hasil1,
            'nama_vendor'=>$hasil2
        );


        }
        $this->cart->insert($data);
        redirect('Pengajuan/tambah_pengajuan','Refresh');
        }else{
             $this->load->view('layouts/header');
             $this->load->view('layouts/sidebar');
             $this->load->view('staff/tambah_pengajuan_vw',$data);
             $this->load->view('layouts/footer');
        }
    }

*/
   



    function add(){

      $id_vendor=$this->input->post('id_vendor');
      $pecah = explode("|", $id_vendor);
      $hasil1 = $pecah[0];
      $hasil2 = $pecah[1];


      $id_divisi=$this->input->post('id_divisi');
      $pecah_divisi = explode("|", $id_divisi);
      $hasil_divisi1 = $pecah_divisi[0];
      $hasil_divisi2 = $pecah_divisi[1];

       $data['kodeunik'] = $this->Pengajuan_model->code_otomatis();
       $data['jenis_request']=$this->Pengajuan_model->select_jenis_request();
       $data['barang']=$this->Pengajuan_model->select_master_barang();
       $data['gedung']=$this->Pengajuan_model->select_master_gedung();
       $data['vendor']=$this->Pengajuan_model->select_master_vendor();
        $data['bank']=$this->Pengajuan_model->select_master_bank();
        $data['divisi']=$this->Pengajuan_model->select_master_divisi();
           $member=$this->input->post('member');
           if($member==on){

            $this->form_validation->set_rules('id_barang','Id Barang','required');
            $this->form_validation->set_rules('nama_barang','Nama Barang','required');
            $this->form_validation->set_rules('qty','Jumlah Barang','required');
            $this->form_validation->set_rules('harga','Harga Barang','required');
            $this->form_validation->set_rules('nama_vendor','Nama Vendor','required');
            $this->form_validation->set_rules('id_bank','Bank','required');
            $this->form_validation->set_rules('alamat_vendor','Alamat  Vendor','required');
            $this->form_validation->set_rules('id_divisi','Divisi Tujuan','required');
            $this->form_validation->set_rules('nama_alokasi','Users Tujuan','required');

            if($this->form_validation->run() != false){    
   

            $nama_vendor      =$this->input->post('nama_vendor');
            $no_telepon_vendor=$this->input->post('no_telepon_vendor');
            $no_rekening_vendor=$this->input->post('no_rekening_vendor');
            $alamat_vendor=$this->input->post('alamat_vendor');
            $id_bank=$this->input->post('id_bank');
            $nama_alokasi =$this->input->post('nama_alokasi');

            $this->Pengajuan_model->insert_vendor($nama_vendor,$no_telepon_vendor,$no_rekening_vendor,$alamat_vendor,$id_bank);
            $last_insert_idd = $this->db->insert_id();

          $datas=array(
            'id'=>$this->input->post('id_barang'),
            'name'=>$this->input->post('nama_barang'),
            'qty'=>$this->input->post('qty'),
            'price'=>$this->input->post('harga'),
            'keterangan'=>$this->input->post('keterangan'),
            'id_vendor'=>$last_insert_idd,
            'nama_vendor'=>$nama_vendor,
            'id_divisi'=> $hasil_divisi1,
            'nama_divisi'=> $hasil_divisi2,
            'nama_alokasi'=> $this->input->post('nama_alokasi')
          );

           $this->cart->insert($datas);
           redirect('Pengajuan/tambah_pengajuan','Refresh');


          }else{
            $this->load->view('layouts/header');
            $this->load->view('layouts/sidebar');
            $this->load->view('staff/tambah_pengajuan_vw',$data);
            $this->load->view('layouts/footer');
          }
    

           }else{

            $this->form_validation->set_rules('id_barang','Id Barang','required');
            $this->form_validation->set_rules('nama_barang','Nama Barang','required');
            $this->form_validation->set_rules('qty','Jumlah Barang','required');
            $this->form_validation->set_rules('harga','Harga Barang','required');
            $this->form_validation->set_rules('id_vendor','Vendor','required');
            $this->form_validation->set_rules('id_divisi','Divisi Tujuan','required');
            $this->form_validation->set_rules('nama_alokasi','Users Tujuan','required');



            



            if($this->form_validation->run() != false){    

             $data=array(
            'id'=>$this->input->post('id_barang'),
            'name'=>$this->input->post('nama_barang'),
            'qty'=>$this->input->post('qty'),
            'price'=>$this->input->post('harga'),
            'keterangan'=>$this->input->post('keterangan'),
            'id_vendor'=>$hasil1,
            'nama_vendor'=>$hasil2,
            'id_divisi'=> $hasil_divisi1,
            'nama_divisi'=> $hasil_divisi2,
            'nama_alokasi'=> $this->input->post('nama_alokasi')
          );

           $this->cart->insert($data);
           redirect('Pengajuan/tambah_pengajuan','Refresh');


          }else{
            $this->load->view('layouts/header');
            $this->load->view('layouts/sidebar');
            $this->load->view('staff/tambah_pengajuan_vw',$data);
            $this->load->view('layouts/footer');
          }
    
        }
        
    }


    
  // Function menghapus detail barang
    function hapus_pengajuan($product){
        $data = array(
            'rowid' => $product,
            'qty' => 0
        );

        $this->cart->update($data);
        redirect('tambah-permintaan','Refresh');
    }

     function update_keranjang(){
        $item = $this->input->post('rowid');

        $qty = $this->input->post('qty');
        $nama_barang = $this->input->post('nama_barang');

    

        $price = $this->input->post('price');

       for($i=0;$i < count($item);$i++)
        {
            
  $data = array(
            'rowid' => $item[$i],
                'name' => $nama_barang[$i],
            'qty' => $qty[$i],
        
            'price' => $price[$i]


        );
            $this->cart->update($data);
        }



       

       
        redirect('tambah-permintaan','Refresh');
    }




  // Function untuk menampilkan daftar permintaan user tersebut
    public function history_pengajuan($offset=0)
    {

        $status_depan = $this->input->get('status_depan');
        $daterange = $this->input->get('daterange');
        $status    = $this->input->get('status');
        $id_p        = $this->input->get('id_p');
        $id_login        = $this->input->get('id_login');
        if($id_login){
            $ID=$this->input->get('id_login');
        }else {

            $ID = $this->ion_auth->user()->row()->id;
        }
        if($status_depan){

            $data['history'] = $this->Pengajuan_model->select_pengajuan_status_depan($ID, $status_depan);
        }else {
            $data['history'] = $this->Pengajuan_model->select_pengajuan_id($ID, $daterange, $status, $id_p);
        }
        if(!$daterange and !$status and !$id_p) {
            $data['link'] = $this->pagination->create_links();
        }
		
		$data['count_persetujuan']=$this->Pengajuan_model->count_select_daftar_persetujuan($ID);
        $data['count_permintaan']=$this->Home_model->count_per_bel_selesai($ID,$daterange);
		
		$data['count_total']=$data['count_persetujuan']+$data['count_permintaan'];
		
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/sidebar');
        $this->load->view('staff/history_pengajuan_vw',$data);
        $this->load->view('layouts/footer');
    }


    function replay($diskusi_id,$product_id,$product_id2){
        $data['replay'] = $this->Pengajuan_model->get_kode($diskusi_id,$product_id,$product_id2);
        $repsan= $this->Pengajuan_model->get_kode($diskusi_id,$product_id,$product_id2);


        foreach($repsan->result() as $an){
            $id_pengajuan=$an->id_pengajuan;
            $id_user=$an->id_user;
            $data['id_pengajuan']=$an->id_pengajuan;
            $data['no_pengajuan']=$an->no_pengajuan;
            $data['tanggal_pengajuan']=$an->tanggal_pengajuan;
            $data['tanggal_required']=$an->tanggal_required;
            $data['prioritas']=$an->prioritas;
            $data['jenis_request']=$an->jenis_request;
            $data['keterangan']=$an->keterangan;
            $data['last_status']=$an->last_status;
            $data['id_user_approval']=$an->id_user_approval;
        }


       $data['detail_barang']=$this->Pengajuan_model->detail_barang_per_id($id_pengajuan);
        $data['history_pengajuan']=$this->Pengajuan_model->history_pengajuan($id_pengajuan);

        $user=$this->Pengajuan_model->user_by_id($id_user);

        foreach($user as $us){

            $data['first_name']=$us->first_name;
            $data['last_name']=$us->last_name;
            $data['nama_divisi']=$us->nama_divisi;
            $data['nama_jabatan']=$us->nama_jabatan;

        }
        $data['user_id']=$diskusi_id;
        $data['awal']=$product_id;
        $data['akhir']=$product_id2;

        $this->load->view('replay',$data);
    }



public function cetak_pengajuan($id_pengajuan)
    {
        $data['detail_permintaan']=$this->Pengajuan_model->select_pengajuan_detail($id_pengajuan);
        $data['detail_barang']=$this->Pengajuan_model->detail_barang_per_id($id_pengajuan);
        $data['history_pengajuan']=$this->Pengajuan_model->history_pengajuan($id_pengajuan);
        $mpdf = new \Mpdf\Mpdf();
        $data = $this->load->view('hasilPrint',$data, TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
       
        
    }

/*
    function detail_permintaan(){

        $id_pengajuan = $this->input->get('id_pengajuan');
        $tanggal_required = $this->input->get('tanggal_required');
        $tanggal_requi=date("Y-m-d", strtotime($tanggal_required));
        $id_jenis_request = $this->input->get('id_jenis_request');
        $keterangan = $this->input->get('keterangan');

        /* echo $id_pengajuan;
        echo '<br/>';
        echo $tanggal_required;
        echo '<br/>';
        echo $id_jenis_request;
        echo '<br/>';
        echo $keterangan; */
/*
        $this->Pengajuan_model->update_pengajuan_id_pengajuan($id_pengajuan, $tanggal_requi, $id_jenis_request, $keterangan);

        $data['sum']=$this->Pengajuan_model->select_sum_detail_pengajuan_id_pengajuan($id_pengajuan);
        $data['limit']=$this->Pengajuan_model->select_limit_detail_pengajuan_id_pengajuan($id_pengajuan);
        $data['detail_pengajuan']=$this->Pengajuan_model->select_detail_pengajuan_id_pengajuan($id_pengajuan);



        /* foreach($data['detail_pengajuan'] as $row){
            $a = $row->qty;
            $b = $row->harga;
            //$id = $row->id_pengajuan;
        }

        $c = $a * $b; */

        //$data['ttl'] = $c;
        //echo $id;
        /* echo $a;
        echo '<br/>';
        echo $b;
        echo '<br/>';
        echo $c;
        echo '<br/>';*/
        /*
$data['id_pengajuan']=$id_pengajuan;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('staff/tambah_detail_pengajuan_vw',$data);
        $this->load->view('layouts/footer');
        //redirect('Pengajuan/history_pengajuan');
    }
    */

    function edit_pengajuan($id_pengajuan){

        $data['jenis_request']=$this->Pengajuan_model->select_jenis_request();
        $data['pengajuan']=$this->Pengajuan_model->select_id_pengajuan_join($id_pengajuan);
        $data['detail_pengajuan']=$this->Pengajuan_model->select_detail_pengajuan_id_pengajuan($id_pengajuan);
$data['gedung']=$this->Pengajuan_model->select_master_gedung();
        $data['vendor']=$this->Pengajuan_model->select_master_vendor();
        $data['bank']=$this->Pengajuan_model->select_master_bank();
        $data['divisi']=$this->Pengajuan_model->select_master_divisi();

        $data['id_pengajuan']=$id_pengajuan;
        $this->load->view('layouts/header');
         $this->load->view('layouts/sidebar');
        $this->load->view('staff/edit_tambah_pengajuan_vw',$data);
        $this->load->view('layouts/footer');
    }

    function do_update_detail_pengajuan(){

        $id_detail = $this->input->post('id_detail');
        $id_pengajuan = $this->input->post('id_pengajuan');
        $nama_barang = $this->input->post('nama_barang');
        $qty = $this->input->post('qty');
        $harga = $this->input->post('harga');
        $tharga = $qty * $harga;

        /* echo $id_detail;
        echo '<br/>';
        echo $id_pengajuan;
        echo '<br/>';
        echo $nama_barang;
        echo '<br/>';
        echo $qty;
        echo '<br/>';
        echo $harga;
        echo '<br/>';
        echo $tharga; */

        $this->Pengajuan_model->update_detail_pengajuan_id_pengajuan($id_detail, $id_pengajuan, $nama_barang, $qty, $harga, $tharga);

        $data['sum']=$this->Pengajuan_model->select_sum_detail_pengajuan_id_pengajuan($id_pengajuan);
        $data['limit']=$this->Pengajuan_model->select_limit_detail_pengajuan_id_pengajuan($id_pengajuan);
        $data['detail_pengajuan']=$this->Pengajuan_model->select_detail_pengajuan_id_pengajuan($id_pengajuan);

        /* foreach($data['detail_pengajuan'] as $row){
            echo $row->id_pengajuan;
            echo '<br/>';
        } */


        $this->load->view('layouts/header');
        $this->load->view('staff/tambah_detail_pengajuan_vw',$data);
        $this->load->view('layouts/footer');

    }

/*
    function do_insert_detail_pengajuan(){

        $id_pengajuan = $this->input->post('id_pengajuan');
        $nama_barang = $this->input->post('nama_barang');
        $qty = $this->input->post('qty');
        $harga = $this->input->post('harga');
        $keterangan = $this->input->post('keterangan');
        $tharga = $qty * $harga;

        /* echo $id_pengajuan;
        echo '<br/>';
        echo $nama_barang;
        echo '<br/>';
        echo $qty;
        echo '<br/>';
        echo $harga;
        echo '<br/>';
        echo $tharga; */
        /*
        $data['id_pengajuan']=$id_pengajuan;
        $this->Pengajuan_model->insert_detail_pengajuan_id_pengajuan($id_pengajuan, $nama_barang, $qty, $harga, $tharga);

        $data['sum']=$this->Pengajuan_model->select_sum_detail_pengajuan_id_pengajuan($id_pengajuan);
        $data['limit']=$this->Pengajuan_model->select_limit_detail_pengajuan_id_pengajuan($id_pengajuan);
        $data['detail_pengajuan']=$this->Pengajuan_model->select_detail_pengajuan_id_pengajuan($id_pengajuan);

        /* foreach($data['detail_pengajuan'] as $row){
            echo $row->id_pengajuan;
            echo '<br/>';
        } */
/*

        $this->load->view('layouts/header');
          $this->load->view('layouts/sidebar');
        $this->load->view('staff/tambah_detail_pengajuan_vw',$data);
        $this->load->view('layouts/footer');

    }


    
*/

      function do_insert_detail_pengajuan(){

        $id_pengajuan     = $this->input->post('id_pengajuan');
        $nama_barang      = $this->input->post('nama_barang');
        $qty              = $this->input->post('qty');
        $harga            = $this->input->post('harga');
        $id_divisi        = $this->input->post('id_divisi');
        $nama_alokasi     = $this->input->post('nama_alokasi');

        $id_vendor        = $this->input->post('id_vendor');
        $keterangan       = $this->input->post('keterangan');
        $tharga           = $qty * $harga;
        $member=$this->input->post('member');
        $data['detail_pengajuan']=$this->Pengajuan_model->select_detail_pengajuan_id_pengajuan($id_pengajuan);
         if($member==on){

            $this->form_validation->set_rules('nama_barang','Nama Barang','required');
            $this->form_validation->set_rules('qty','Jumlah Barang','required');
            $this->form_validation->set_rules('harga','Harga Barang','required');
            $this->form_validation->set_rules('nama_vendor','Nama Vendor','required');
            $this->form_validation->set_rules('id_bank','Bank','required');
            $this->form_validation->set_rules('alamat_vendor','Alamat  Vendor','required');
            $this->form_validation->set_rules('id_divisi','Divisi Tujuan','required');
            $this->form_validation->set_rules('nama_alokasi','Users Tujuan','required');

            if($this->form_validation->run() != false){    

            $nama_vendor        = $this->input->post('nama_vendor');
            $no_telepon_vendor  = $this->input->post('no_telepon_vendor');
            $no_rekening_vendor = $this->input->post('no_rekening_vendor');
            $alamat_vendor      = $this->input->post('alamat_vendor');
            $id_bank            = $this->input->post('id_bank');
            $nama_alokasi       = $this->input->post('nama_alokasi');

            $this->Pengajuan_model->insert_vendor($nama_vendor,$no_telepon_vendor,$no_rekening_vendor,$alamat_vendor,$id_bank);
            $last_insert_idd = $this->db->insert_id();
            /*
           $datas=array(
            'id'=>$this->input->post('id_barang'),
            'name'=>$this->input->post('nama_barang'),
            'qty'=>$this->input->post('qty'),
            'price'=>$this->input->post('harga'),
            'keterangan'=>$this->input->post('keterangan'),
            'id_vendor'=>$last_insert_idd,
            'nama_vendor'=>$nama_vendor,
            'id_divisi'=> $hasil_divisi1,
            'nama_divisi'=> $hasil_divisi2,
            'nama_alokasi'=> $this->input->post('nama_alokasi')
          );

           $this->cart->insert($datas);
           */

                
           $this->Pengajuan_model->insert_detail_pengajuan_id_pengajuan($id_pengajuan,$nama_barang,$qty,$harga, $tharga,$id_divisi,$nama_alokasi,$last_insert_idd);

           redirect('Pengajuan/detail_edit_pengajuan/'.$id_pengajuan);

          }else{
            $this->load->view('layouts/header');
            $this->load->view('layouts/sidebar');
            $this->load->view('staff/tambah_detail_pengajuan_vw',$data);
            $this->load->view('layouts/footer');
          }
    

           }else{

        
            $this->form_validation->set_rules('nama_barang','Nama Barang','required');
            $this->form_validation->set_rules('qty','Jumlah Barang','required');
            $this->form_validation->set_rules('harga','Harga Barang','required');
            $this->form_validation->set_rules('id_vendor','Vendor','required');
            $this->form_validation->set_rules('id_divisi','Divisi Tujuan','required');
            $this->form_validation->set_rules('nama_alokasi','Users Tujuan','required');

           if($this->form_validation->run() != false){    

           $this->Pengajuan_model->insert_detail_pengajuan_id_pengajuan($id_pengajuan, $nama_barang, $qty, $harga, $tharga,$id_divisi,$nama_alokasi,$id_vendor);
           redirect('Pengajuan/detail_edit_pengajuan/'.$id_pengajuan);

          }else{
            $this->load->view('layouts/header');
            $this->load->view('layouts/sidebar');
            $this->load->view('staff/tambah_detail_pengajuan_vw',$data);
            $this->load->view('layouts/footer');
          }
    
        }
    
        
       

        

    }


    //Detail Pengajuan 2

    public function detail_pengajuan_2($id_pengajuan)
    {
        
        $data['history']=$this->Pengajuan_model->history_pengajuan($id_pengajuan);
        $permintaan_ajuan=$this->Pengajuan_model->select_pengajuan_detail($id_pengajuan);
        foreach($permintaan_ajuan as $his){
          $data['no_permintaan']=$his->no_pengajuan;
        }

        $data['permintaan_ajuan']=$this->Pengajuan_model->select_pengajuan_detail($id_pengajuan);
        $data['detail_barang']=$this->Pengajuan_model->detail_barang_per_id($id_pengajuan);
         $this->load->view('layouts/header');
         $this->load->view('layouts/sidebar');
         $this->load->view('staff/detail_pengajuan_vw',$data);
         $this->load->view('layouts/footer');
    }

/*

      function hapus_detail_permintaan()
  {
        $id_pengajuan = $this->input->get('id_pengajuan');
        $tanggal_required = $this->input->get('tanggal_required');
        $id_jenis_request = $this->input->get('id_jenis_request');
        $keterangan = $this->input->get('keterangan');
        $id_detail = $this->input->get('id_detail');
        $data['sum']=$this->Pengajuan_model->select_sum_detail_pengajuan_id_pengajuan($id_pengajuan);
        $data['limit']=$this->Pengajuan_model->select_limit_detail_pengajuan_id_pengajuan($id_pengajuan);
        $data['detail_pengajuan']=$this->Pengajuan_model->select_detail_pengajuan_id_pengajuan($id_pengajuan);
        $this->Pengajuan_model->hapus_detail_permintaan($id_detail);
		$data['id_pengajuan']=$id_pengajuan;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('staff/tambah_detail_pengajuan_vw',$data);
        $this->load->view('layouts/footer');

  }
*/

     function hapus_detail_permintaan($id_detail,$id_pengajuan)
  {
        
       
        $this->Pengajuan_model->hapus_detail_permintaan($id_detail);
        $data['id_pengajuan']=$id_pengajuan;
        redirect('Pengajuan/detail_edit_pengajuan/'.$id_pengajuan);

  }


   function detail_permintaan(){


        
        $id_pengajuan     = $this->input->post('id_pengajuan');
        $tanggal_required = $this->input->post('tanggal_required');


        $tanggal_requi    =date("Y-m-d", strtotime($tanggal_required));
        $id_jenis_request = $this->input->post('id_jenis_request');
        $keterangan       = $this->input->post('keterangan');
        $id_gedung        = $this->input->post('id_gedung');
         
        
        $metode_pembayaran        = $this->input->post('metode_pembayaran');
        $tanggal_jatuh_tempo      = $this->input->post('tanggal_jatuh_tempo');
        $tanggal_jatuh       = date("Y-m-d", strtotime($tanggal_jatuh_tempo) );

        $this->form_validation->set_rules('tanggal_required','Tanggal Dibutuhkan Barang','required');
        $this->form_validation->set_rules('id_gedung','Nama Gedung','required');
        $this->form_validation->set_rules('metode_pembayaran','Metode Pembayaran','required');


        $this->Pengajuan_model->update_pengajuan_id_pengajuan($id_pengajuan, $tanggal_requi, $id_jenis_request, $keterangan,$id_gedung,$metode_pembayaran,$tanggal_jatuh);
        
        


        $data['sum']=$this->Pengajuan_model->select_sum_detail_pengajuan_id_pengajuan($id_pengajuan);
        $data['limit']=$this->Pengajuan_model->select_limit_detail_pengajuan_id_pengajuan($id_pengajuan);
        $data['detail_pengajuan']=$this->Pengajuan_model->select_detail_pengajuan_id_pengajuan($id_pengajuan);



        /* foreach($data['detail_pengajuan'] as $row){
            $a = $row->qty;
            $b = $row->harga;
            //$id = $row->id_pengajuan;
        }

        $c = $a * $b; */

        //$data['ttl'] = $c;
        //echo $id;
        /* echo $a;
        echo '<br/>';
        echo $b;
        echo '<br/>';
        echo $c;
        echo '<br/>';*/
       $data['id_pengajuan']=$id_pengajuan;
         ;
         $data['jenis_request']=$this->Pengajuan_model->select_jenis_request();
        $data['pengajuan']=$this->Pengajuan_model->select_id_pengajuan_join($id_pengajuan);
        $data['detail_pengajuan']=$this->Pengajuan_model->select_detail_pengajuan_id_pengajuan($id_pengajuan);
        $data['gedung']=$this->Pengajuan_model->select_master_gedung();
        $data['vendor']=$this->Pengajuan_model->select_master_vendor();
        $data['bank']=$this->Pengajuan_model->select_master_bank();
        $data['divisi']=$this->Pengajuan_model->select_master_divisi();

        $this->session->set_flashdata('id_pengajuan', $id_pengajuan);
        redirect('Pengajuan/detail_edit_pengajuan/'.$id_pengajuan);
        //redirect('Pengajuan/history_pengajuan');
    }

    function detail_edit_pengajuan($id_pengajuan){
       
        $data['jenis_request']=$this->Pengajuan_model->select_jenis_request();
        $data['pengajuan']=$this->Pengajuan_model->select_id_pengajuan_join($id_pengajuan);
        $data['gedung']=$this->Pengajuan_model->select_master_gedung();
        $data['vendor']=$this->Pengajuan_model->select_master_vendor();
        $data['bank']=$this->Pengajuan_model->select_master_bank();
        $data['divisi']=$this->Pengajuan_model->select_master_divisi();


          $data['detail_pengajuan']=$this->Pengajuan_model->select_detail_pengajuan_id_pengajuan($id_pengajuan);
          $data['id_pengajuan']=$id_pengajuan;
          $this->load->view('layouts/header');
          $this->load->view('layouts/sidebar');
          $this->load->view('staff/tambah_detail_pengajuan_vw',$data);
          $this->load->view('layouts/footer');
    }

  // Function untuk menyimpan pengajuan

    public function save_submission(){


        $no_pengajuan        = $this->input->post('no_pengajuan');
        $tanggal_pengajuan   = $this->input->post('tanggal_pengajuan');
        $id_jenis_request    = $this->input->post('id_jenis_request');
        $keterangan          = $this->input->post('keterangan');
        $tanggal_required    = $this->input->post('tanggal_required');
        $tanggal_requi       = date("Y-m-d", strtotime($tanggal_required) );
        $tujuan              = $this->input->post('tujuan');
        $id_gedung            = $this->input->post('id_gedung');
        $metode_pembayaran    = $this->input->post('metode_pembayaran');
        $ppn                  = $this->input->post('ppn');
        $id_bank              = $this->input->post('id_bank');
        $tanggal_jatuh_tem    = $this->input->post('tanggal_jatuh_tempo');
        $tanggal_jatuh_tempo  =date("Y-m-d", strtotime($tanggal_jatuh_tem) );
      


        if($ppn) {
        $jumlahtotal          = $this->input->post('jumlahtotal');
        }else{
         $jumlahtotal         = $this->cart->total();
        }
       

        



       // kode yang digunakan untuk no permintaan
       $data['kodeunik'] = $this->Pengajuan_model->code_otomatis();

       // Jenis permintaan -> misalkan ini termasuk permintaan baran, jasa atau karyawan, dll //

       $data['jenis_request']=$this->Pengajuan_model->select_jenis_request();
       



       $data['barang']=$this->Pengajuan_model->select_master_barang();
       $data['gedung']=$this->Pengajuan_model->select_master_gedung();
       $data['vendor']=$this->Pengajuan_model->select_master_vendor();
       $data['bank']=$this->Pengajuan_model->select_master_bank();

       // Form validation untuk menyaring inputan yang dimasukkan user

        $this->form_validation->set_rules('tanggal_required','Tanggal Dibutuhkan Barang','required');
        $this->form_validation->set_rules('id_gedung','Nama Gedung','required');
        $this->form_validation->set_rules('metode_pembayaran','Metode Pembayaran','required');

        if($this->form_validation->run() != false){


        // mengambil ID user yang login
        
        $ID                 = $this->ion_auth->user()->row()->id;

        // selesai mengambil ID user yang login
      
        // cek jumlah group users
        $cek_jumlah_group_users=$this->Pengajuan_model->cek_jumlah_group_users($ID);
        

         // jika dia punya 1 group
        if($cek_jumlah_group_users==1){
        $cek_level_user     = $this->Pengajuan_model->cek_users($ID);
        foreach($cek_level_user as $rows){
              $group=$rows->name;
              $id_groups=$rows->id_groups;
              $email_pembuat=$rows->email;
              $id_line_manajer=$rows->id_line_manajer;
        }

        // jika punya lebih dari 1
        }else{
         $cek_group_users=$this->Pengajuan_model->cek_group_users($ID);
         foreach ($cek_group_users as $m) :
         $as[]=$m->group_id;
         ",";
        endforeach;

 $jabs = count($as)-1;   
$value = $as;
$ranking = array();
foreach ($value as $k => $v){
    array_push($ranking, $v);
}

for ($a = 0; $a <= $jabs; $a ++) {

  $id_g=$as[$a]; 
  
$cekurutan=$this->Pengajuan_model->cekrule($id_jenis_request,$id_g);
        foreach($cekurutan as $ceks):
             $urutan_array[]=$ceks->urutan;
        endforeach;

}

$MAX_VALUE=200;
    $a=$urutan_array;
    for($i=0;$i<count($a) ;$i++){
             if($a[$i] < $MAX_VALUE){
                 $MAX_VALUE=$a[$i];
             }

}
$urutan_d= $MAX_VALUE;
$cek_id_groups=$this->Pengajuan_model->nextrule($id_jenis_request,$urutan_d);
foreach($cek_id_groups as $gr){

    $id_groups=$gr->id_groups;
}

}

        // Selesai mengecek group users
        

        $foto = $_FILES['foto']['name'];

        $foto_name = str_replace(" ", "_", $foto);

        $config['upload_path'] = './files/pengajuan/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xls|xlsx|csv';
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');

        // Jika pilih permintaan barang
        if($id_jenis_request==1){
            $total_belanja=$this->cart->total();
            $aturan=$this->Pengajuan_model->select_aturan($id_jenis_request);

            if(count($aturan>0)){
            foreach($aturan as $row){
                $batas_atas=$row->batas_atas;
              }
            }
            if($total_belanja > $batas_atas){
              $id_jenis_request=3;
            }else{
              $id_jenis_request=1;
            }

        }
        // Selesai Permintaan Barang

        if($ppn){
             $total_belanja=$jumlahtotal;
        }else{
            $total_belanja=$this->cart->total();
        }


        // Cek Rule

        $cekrule=$this->Pengajuan_model->cekrule($id_jenis_request,$id_groups);
        $cek_manager=$this->Pengajuan_model->user_by_id($ID);
        foreach($cek_manager as $cem){

            $id_manager=$cem->id_line_manajer;
        }



        
        if($id_manager !=0 and $id_groups==2){
        foreach($cekrule as $cek){
             $urutan=$cek->urutan;
        }
       }elseif($id_manager==0 and $id_groups==2){


         foreach($cekrule as $cek){
             $urutan=$cek->urutan;
        }

        
             $urutan=$urutan+1;
       }elseif($id_manager==0 and $id_groups !=2){
         foreach($cekrule as $cek){
             $urutan=$cek->urutan;
        }
       }

      

        



        // Selesai cek rule
        


         


        $this->Pengajuan_model->insert_pengajuan_new($ID, $tanggal_pengajuan,$tanggal_requi, $id_jenis_request,$keterangan, $no_pengajuan,$foto_name,$tujuan,$urutan,$metode_pembayaran,$ppn,$jumlahtotal,$tanggal_jatuh_tempo,$id_gedung);

       


         $last_insert_id = $this->db->insert_id();
         

/*
        $id_terakhir=$this->Pengajuan_model->select_id_terakhir();
        foreach($id_terakhir as $row){
             $last_insert_id = $row->id_pengajuan;
        }
        */
        

        $next_urutan=$urutan+1;
        $nextrule=$this->Pengajuan_model->nextrule($id_jenis_request,$next_urutan);
        foreach($nextrule as $next){
              $namagroup=$next->nama_group;
              $id_groups=$next->id_groups;
        }



        // cek user penerimaa

        // jika urutan 1 and group name == manager -> artinya jika dia staff biasa dan grup penerima selanjutnya adalah manager

        if($urutan==1 and $namagroup=="manager"){
            $next=1;

        	


              if($id_line_manajer !=0){
                
              	
                      $cek_penerima=$this->Pengajuan_model->select_manajer($ID);
                      foreach ($cek_penerima as $ce) {
                             $id_penerima=$ce->id_line_manajer;
                         }
                       $cek_email_penerima=$this->Pengajuan_model->select_manajer($id_penerima);
                       foreach ($cek_email_penerima as $c):
                               $email_penerima[]=$c->email;
                               /*
                               
                               $this->kirim_email_penerima($email_penerima, $last_insert_id,$total_belanja,$foto_name);
                               */
                        endforeach;

           
              }elseif($id_line_manajer==0 or $id_line_manajer==NULL){
               $next=$urutan+2;

               

               $nextrules=$this->Pengajuan_model->nextrule($id_jenis_request,$next);
                    foreach($nextrules as $nexts){
                          $namagroups=$nexts->nama_group;
                          $id_groupss=$nexts->id_groups;
                          }
              $cek_penerimaa_n=$this->Pengajuan_model->select_penerima($id_groupss);
                   foreach ($cek_penerimaa_n as $cemn) {
                          $id_penerima=$cemn->user_id;
                          $email_penerima[]=$cemn->email;
                          /*
                          $this->kirim_email_penerima($email_penerima, $last_insert_id,$total_belanja,$foto_name);
                          */
                         }
              }
              

        }elseif($urutan !=1 and $namagroup !='manager'){
               

              $cek_penerimaa=$this->Pengajuan_model->select_penerima($id_groups);
              foreach ($cek_penerimaa as $cem) {
                 $id_penerima=$cem->user_id;
                 $email_penerima[]=$cem->email;
                 /*
                 $this->kirim_email_penerima($email_penerima, $last_insert_id,$total_belanja,$foto_name);
                 */
                 }

        }elseif($urutan==1 and $namagroup !='manager'){
               $urutan=$urutan+2;
               $next=$urutan+2;
               $nextrules=$this->Pengajuan_model->nextrule($id_jenis_request,$urutan);
                    foreach($nextrules as $nexts){
                          $namagroups=$nexts->nama_group;
                          $id_groups=$nexts->id_groups;
                          }
              $cek_penerimaa_n=$this->Pengajuan_model->select_penerima($id_groups);
                   foreach ($cek_penerimaa_n as $cemn) {
                          $id_penerima=$cemn->user_id;
                          $email_penerima[]=$cemn->email;
                          /*
                          $this->kirim_email_penerima($email_penerima, $last_insert_id,$total_belanja,$foto_name);
                          */
                    }

        }
         
        //insert data dan kirim email ke penerima
        /*
        $this->Pengajuan_model->insert_alokasi($id_gedung,$id_divisi, $nama_alokasi);
        $last_alokasi = $this->db->insert_id();
        */

var_dump($id_groups);
         
        // kirim email penerima // untuk memberitahukan kalau ada persetujuan baru
 $this->Pengajuan_model->insert_history_pengajuan_new($last_insert_id,'',$id_penerima,$urutan,'',$id_groups);
          foreach ($this->cart->contents() as $items):
              $order_detail['id_pengajuan'] = $last_insert_id;
              $order_detail['nama_barang'] = $items['name'];
              $order_detail['qty'] = $items['qty'];
              $order_detail['harga'] = $items['price'];
              $order_detail['tharga'] = $items['subtotal'];
              $order_detail['keterangan'] = $items['keterangan'];
              $order_detail['id_vendor'] = $items['id_vendor'];
              $order_detail['id_divisi'] = $items['id_divisi'];
              $order_detail['nama_users'] = $items['nama_alokasi'];
              $this->db->insert("detail_pengajuan", $order_detail);
          endforeach;
        
         
$this->kirim_email_penerima($email_penerima, $last_insert_id,$total_belanja,$foto_name);
           $this->kirim_email_pembuat($email_pembuat,$last_insert_id,$total_belanja,$foto_name);
       
        // kirim email ke pembuat untuk konfirmasi  status persetujuan 
         /*
         $this->kirim_email_pembuat($email_pembuat, $last_insert_id,$total_belanja);
         */
       
         
         echo $this->session->set_flashdata('message', '<div class="alert alert-info"><b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Permintaan berhasil ditambahkan dengan nomor 
              ' .$no_pengajuan.' 
            </b></div>');
         $this->cart->destroy();
         $this->session->unset_userdata('users');
         redirect('daftar-permintaan','refresh');
       }else{
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('staff/tambah_pengajuan_vw',$data);
        $this->load->view('layouts/footer');
       }
    }


// mengirim email ke user tujuan jika ada pemberitahuan pengajuan baru
/*
    function kirim_email_penerima($email,$last_insert_id,$total_belanja,$foto_name=""){



$count_email=count($email);
        

$id_peng=$last_insert_id;
$your_file="Cepatlakoo-Dokumentasi.pdf";
         $this->load->helper('path');
$path = set_realpath('./files/pengajuan');
        $tot=number_format($total_belanja);
        $ID = $this->ion_auth->user()->row()->id;
        $permintaan_ajuan=$this->Pengajuan_model->select_pengajuan_detail($last_insert_id);
        /*
    $history_terakhir=$this->Pengajuan_model->history_terakhir($last_insert_id);
        foreach($history_terakhir as $his){
            $urutan_sekarang=$his->urutan;
            $grup_sekarang=$his->name;
        }

         $data['urutan']=$urutan_sekarang;
       $data['grup_sekarang']=$grup_sekarang;
       */
       /*
        $data['permintaan']=$this->Pengajuan_model->detail_barang_per_id($last_insert_id);

        $data['email']=$email;
        $data['id_pengirim']=$ID;
        $data['id_pengajuan']=$id_peng;

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
             $data['id_user_approval']=$per->id_user_approval;
             $data['status_user']=$per->status_user;
             $data['id_jenis_request']=$per->id_jenis_request;
             $data['ket']=$per->ket;
            $data['lampiran']=$per->lampiran;
            $data['tujuan']=$per->tujuan;
            $data['metode_pembayaran']=$per->metode_pembayaran;
            $data['ppn']=$per->ppn;
            $data['grand_total']=$per->grand_total;
            $data['tipe_pajak']=$per->tipe_pajak;
             $nomor_pengajuan=$per->no_pengajuan;

             $tgl_pengajuan=$per->tanggal_pengajuan;
              $id_pengajuan=$per->id_pengajuan;
         }

    $data['vendor']=$this->Pengajuan_model->select_vendor($id_pengajuan);
    
               $data['permintaan']=$this->Pengajuan_model->detail_barang_per_id($id_pengajuan);                    
     $data['asu']='ase';
     $this->load->library('email');
     $data['pengajuan']=$this->Pengajuan_model->select_pengajuan_by_no($id_pengajuan);

$i=0;
while ($i <= $count_email)
{
  $email_asli=$email[$i];
  $data['email_asli']=$email_asli;
  $message = $this->load->view('email_baru/konfirmasi_email2',$data, TRUE);
  $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
    $this->email->to($email_asli);
   $this->email->subject('Pengajuan Permintaan Baru (#'.$nomor_pengajuan.') - (Rp'.$tot.')- ('.$tgl_pengajuan.')');
     $this->email->message($message);
    /*
     $this->email->attach('http://localhost/approval_id/files/pengajuan/IMG_9840.jpg');
     */
     /*
     if($foto_name){
     $this->email->attach('http://portal.aartijaya.com/files/pengajuan/'.$foto_name);
     }
     
     $this->email->send();
    
  $i=$i+1;
}

 
      
  

     
     

  }

*/



   function kirim_email_penerima($email,$last_insert_id,$total_belanja,$foto_name="",$lampiran=""){
       


        
        $tot=number_format($total_belanja);
        $ID = $this->ion_auth->user()->row()->id;
        $permintaan_ajuan=$this->Pengajuan_model->select_pengajuan_detail($last_insert_id);
        $history_terakhir=$this->Pengajuan_model->history_terakhir($last_insert_id);
        foreach($history_terakhir as $his){
            $urutan=$his->urutan;
            $grup_sekarang=$his->name;
        }
       $data['grup_sekarang']=$grup_sekarang;
        $data['urutan']=$urutan;
    
        $data['permintaan']=$this->Pengajuan_model->detail_barang_per_id($last_insert_id);
        $data['email']=$email;
         $history=$this->user_pengajuan_model->cek_history_terakhir_pr($last_insert_id);
      foreach($history as $fo){
        $data['groupid']=$fo->groupid;
        $data['status_history']=$fo->status;
      }


     
 

        $data['id_pengajuan']=$last_insert_id;

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
             $data['nama_gedung']=$per->nama_gedung;
             $data['id_user_approval']=$per->id_user_approval;
             $data['status_user']=$per->status_user;
             $data['id_jenis_request']=$per->id_jenis_request;
             $data['ket']=$per->keterangan;
             $data['lampiran']=$per->lampiran;
              $data['tujuan']=$per->tujuan;
               $data['metode_pembayaran']=$per->metode_pembayaran;
            $data['ppn']=$per->ppn;
            $data['grand_total']=$per->grand_total;
             $nomor_pengajuan=$per->no_pengajuan;
  $id_pengajuan=$per->id_pengajuan;
             $tgl_pengajuan=$per->tanggal_pengajuan;
         }

    $data['vendor']=$this->Pengajuan_model->select_vendor($id_pengajuan);


$data['history']=$this->Pengajuan_model->history_pengajuan($id_pengajuan);
     $data['asu']='ase';
     $this->load->library('email');
     $data['pengajuan']=$this->Pengajuan_model->select_pengajuan_by_no($last_insert_id);
     /*
     $message = $this->load->view('email_baru/konfirmasi_email2',$data, TRUE);
     $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
     $this->email->to($email); 
     $this->email->subject('Pengajuan Permintaan Baru (#'.$nomor_pengajuan.') - (Rp'.$tot.')- ('.$tgl_pengajuan.')');
     $this->email->message($message);
     if($foto_name or $lampiran){
     $this->email->attach('http://portal.aartijaya.com/files/pengajuan/'.$foto_name);
     }

     $this->email->send();
     */
     $i=0;
while ($i <= $count_email)
{
  $email_asli=$email[$i];

  $data['email_asli']=$email_asli;
  $message = $this->load->view('email_baru/konfirmasi_email2',$data, TRUE);
  $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
    $this->email->to($email[$i]);
   $this->email->subject('Pengajuan Permintaan Baru (#'.$nomor_pengajuan.') - (Rp'.$tot.')- ('.$tgl_pengajuan.')');
     $this->email->message($message);
    /*
     $this->email->attach('http://localhost/approval_id/files/pengajuan/IMG_9840.jpg');
     */
     if($foto_name){
     $this->email->attach('http://portal.aartijaya.com/files/pengajuan/'.$foto_name);
     }
     
     $this->email->send();
    
  $i=$i+1;
}
     

  }


    

/*
   function kirim_email_pembuat($email,$last_insert_id,$total_belanja,$foto_name=""){

        $tot=number_format($total_belanja);
        $permintaan_ajuan=$this->Pengajuan_model->select_pengajuan_detail($last_insert_id);
        $data['permintaan']=$this->Pengajuan_model->detail_barang_per_id($last_insert_id);
        $data['email']=$email_pengirim;
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
            $data['id_jenis_request']=$per->id_jenis_request;
            $data['keterangan']=$per->keterangan;
            $data['last_status']=$per->last_status;
            $data['id_user_approval']=$per->id_user_approval;
            $data['status_user']=$per->status_user;
            $data['ket']=$per->keterangan;
            $data['lampiran']=$per->lampiran;
            $data['tujuan']=$per->tujuan;
            $data['metode_pembayaran']=$per->metode_pembayaran;
            $data['ppn']=$per->ppn;
            $data['grand_total']=$per->grand_total;
            $nama_manajer=$per->id_user_approval;
            $nomor_pengajuan=$per->no_pengajuan;
            $tgl_pengajuan=$per->tanggal_pengajuan;
            $id_pengajuan=$per->id_pengajuan;
        }

     $data['vendor']=$this->Pengajuan_model->select_vendor($id_pengajuan);
     $this->load->library('email');
     $message = $this->load->view('email_new/email_view_invoice',$data, TRUE);
     $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
     $this->email->to($email); 
     $this->email->subject('Konfirmasi Status Permintaan (#'.$nomor_pengajuan.') - (Rp'.$tot.')- ('.$tgl_pengajuan.')');
     $this->email->message($message);
  if($foto_name){
     $this->email->attach('http://portal.aartijaya.com/files/pengajuan/'.$foto_name);
     }
     $this->email->send();
     
  }


*/

/*
 // mengirim email kepada pembuat permintaan
  function kirim_email_pembuat($email,$last_insert_id,$total_belanja){





        $tot=number_format($total_belanja);
        $permintaan_ajuan=$this->Pengajuan_model->select_pengajuan_detail($last_insert_id);
        $data['permintaan']=$this->Pengajuan_model->detail_barang_per_id($last_insert_id);
        $data['email']=$email_pengirim;
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
            $data['id_jenis_request']=$per->id_jenis_request;
            $data['keterangan']=$per->keterangan;
            $data['last_status']=$per->last_status;
            $data['id_user_approval']=$per->id_user_approval;
            $data['status_user']=$per->status_user;
            $data['ket']=$per->ket;
            $nama_manajer=$per->id_user_approval;
            $nomor_pengajuan=$per->no_pengajuan;
            $tgl_pengajuan=$per->tanggal_pengajuan;
        }

     $this->load->library('email');
     $message = $this->load->view('email_new/comal',$data, TRUE);
     $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
     $this->email->to($email); 
     $this->email->subject('Konfirmasi Status Permintaan (#'.$nomor_pengajuan.') - (Rp'.$tot.')- ('.$tgl_pengajuan.')');
     $this->email->message($message);
     /*
     $this->email->send();
     */

/*
     if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
            die;
        } else {
            echo 'Error! email tidak dapat dikirim.';
            die;

        }
     
  }

*/


  

  // mengirim email kepada pembuat permintaan
  function kirim_email_approv($email,$last_insert_id,$total_belanja){
     
        $tot=number_format($total_belanja);
       $permintaan_ajuan=$this->Pengajuan_model->select_pengajuan_detail($id_pengajuan);
        $data['permintaan']=$this->Pengajuan_model->detail_barang_per_id($id_pengajuan);
        $data['email']=$email;


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
            $data['id_user_approval']=$per->id_user_approval;
            $data['status_user']=$per->status_user;
            $data['ket']=$per->ket;
            $nama_manajer=$per->id_user_approval;
            $nomor_pengajuan=$per->no_pengajuan;
            $tgl_pengajuan=$per->tanggal_pengajuan;


        }

        $data['email']=$email;
        $data['id_pengajuan']=$id_pengajuan;

     $this->load->library('email');
     $message = $this->load->view('email/email_manager',$data, TRUE);
     $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
     $this->email->to($email); 
     $this->email->subject('Pengajuan Permintaan Baru (#'.$nomor_pengajuan.') - (Rp'.$tot.')- ('.$tgl_pengajuan.')');
     $this->email->message($message);
     $this->email->send();
     
  }


    public function persetujuan()
    {

        $group  = array('manager');
        $group2 = array('general manager');
        $group3 = array('kepala regional');
     
         
        $ID_s = $this->ion_auth->user()->row()->id;
        $users_groups = $this->ion_auth_model->get_users_groups($ID_s)->result();
            $groups_array = array();
            foreach ($users_groups as $group)
            {
                $groups_array[$group->id] = $group->name;
                $groupname=$group->name;
                $groupid=$group->id;
            }


           
        $group_gm = array('manager');
        if ($this->ion_auth->in_group($group_gm)){

          $data['daftar_persetujuan']=$this->Pengajuan_model->select_daftar_persetujuan('15',$ID_s);
        }elseif($this->ion_auth->in_group($group2)){
             $data['daftar_persetujuan']=$this->Pengajuan_model->select_daftar_persetujuan('14');
          }elseif($this->ion_auth->in_group($group3)){
            
             $data['daftar_persetujuan']=$this->Pengajuan_model->select_daftar_persetujuan('23',$ID_s);
          }else{


            $data['daftar_persetujuan']=$this->Pengajuan_model->select_daftar_persetujuan($groupid);
          }




/*

          if ($this->ion_auth->in_group($group)){ 



           
          }elseif($this->ion_auth->in_group($group2)){
             $data['daftar_persetujuan']=$this->Pengajuan_model->select_daftar_persetujuan('14');
          }elseif($this->ion_auth->in_group($group3)){
            
             $data['daftar_persetujuan']=$this->Pengajuan_model->select_daftar_persetujuan('23',$ID_s);
          }else{


            $data['daftar_persetujuan']=$this->Pengajuan_model->select_daftar_persetujuan($groupid);
          }


*/


        if ($this->ion_auth->in_group($group_gm)){ 
                $daftar=$this->Pengajuan_model->select_daftar_persetujuan('15',$ID_s);
        }elseif($this->ion_auth->in_group($group2)){
               $daftar=$this->Pengajuan_model->select_daftar_persetujuan('14',$ID_s);
        }elseif($this->ion_auth->in_group($group3)){
               $daftar=$this->Pengajuan_model->select_daftar_persetujuan('23',$ID_s);
        }else{
                $daftar=$this->Pengajuan_model->select_daftar_persetujuan($groupid);

        }
        foreach($daftar as $da){

            $data['email_pengirim']       =$da->email;
            $data['id_pengirim']          =$da->id;
            $data['id_pengajuan']         =$da->id_pengajuan;
            $data['id_jenis_request']     =$da->id_jenis_request;
            $data['urutan_pengajuan']     =$da->urutan;
            $data['urutan_groups']        =$da->id_groups;
            $data['id_history']   	      =$da->id_his;
            $data['id_user']   		      =$da->id_user;
            $data['id_penerima']   		  =$da->id_penerima;

        }
		
		$daterange=$this->input->get('daterange');
	    $data['count_persetujuan']=$this->Pengajuan_model->count_select_daftar_persetujuan($ID);
        $data['count_permintaan']=$this->Home_model->count_per_bel_selesai($ID,$daterange);
		
		$data['count_total']=$data['count_persetujuan']+$data['count_permintaan'];
		
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/sidebar');
        $this->load->view('persetujuan_vw',$data);
        $this->load->view('layouts/footer');
    }


     public function history_persetujuan()
    {
        $group = array('manager','general manager','kepala regional');
        if (!$this->ion_auth->in_group($group)){ redirect('login');}

        $ID = $this->ion_auth->user()->row()->id;
/*
        $users_groups = $this->ion_auth_model->get_users_groups($ID_s)->result();
            $groups_array = array();
            foreach ($users_groups as $group)
            {
                $groups_array[$group->id] = $group->name;
                $groupname=$group->name;
                $groupid=$group->id;
            }
       


           $grup=array('manager');
          if ($this->ion_auth->in_group($grup)){ 
            

           $data['persetujuan']=$this->Pengajuan_model->history_persetujuan($groupid,$ID_s);
           

          }else{
            $data['persetujuan']=$this->Pengajuan_model->history_persetujuan($groupid);
          }

       */
        $data['persetujuan']=$this->Pengajuan_model->history_persetujuan($ID);
        
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('history_persetujuan_vw',$data);
        $this->load->view('layouts/footer');
    }




     public function detaill()
    {
        $id_pengajuan= $this->input->post('ids');
        $data['history']=$this->Pengajuan_model->history_pengajuan($id_pengajuan);
        $permintaan_ajuan=$this->Pengajuan_model->select_pengajuan_detail($id_pengajuan);
        foreach($permintaan_ajuan as $his){
          $data['id_pengajuan']=$his->id_pengajuan;
          $data['no_permintaan']=$his->no_pengajuan;
          $data['id_jenis_request']=$his->id_jenis_request;
          $id_pengajuan=$his->id_pengajuan;
          $id_alokasi=$his->id_alokasi;
        }
        $data['alokasi']=$this->Pengajuan_model->select_alokasi($id_alokasi);
        $data['permintaan_ajuan']=$this->Pengajuan_model->select_pengajuan_detail($id_pengajuan);
        
        $data['detail_barang']=$this->Pengajuan_model->detail_barang_per_id($id_pengajuan);
        $data['id_pengajuan']=$id_pengajuan;
        $this->load->view('detail_persetujuan_vw',$data);
        
    }


     public function simpan_keputusan()
    {
        $id_penerima          = $this->ion_auth->get_user_id();
        $email_penerima       = $this->session->userdata( 'email');
        $id_groups            = $this->ion_auth->get_users_groups()->row()->id;
        $status_approval      = $this->input->post('status_approval');
        $catatan              = $this->input->post('catatan');
        $id_pengajuan         = $this->input->post('id_pengajuan');
        $tanggal_persetujuan  = date('Y-m-d');
        $id_jenis_request     = $this->input->post('id_jenis_request');
        $urutan               = $this->input->post('urutan');
        /*
        $urutan_groups        = $this->input->post('urutan_groups');
        */
        $id_pengirim          = $this->input->post('id_pengirim');
        $cari_nama_divisi=$this->User_pengajuan_model->get_users_id($id_pengirim);
        foreach($cari_nama_divisi as $car){
            $nama_divisi=$car->nama_divisi;
        }

        

        $email_pengirim       = $this->input->post('email_pengirim');
       

        /*
        $id_history           = $this->input->post('id_history');
        */

        // next urutan


      
      $urutan_selanjutnya=$urutan;
           


       $next_penerima=$urutan_selanjutnya+1;
       $nextpenerima=$this->Pengajuan_model->nextrule($id_jenis_request,$next_penerima);
       $jumlah_penerima=count($nextpenerima);
       foreach($nextpenerima as $nextpe){
              $groupname=$nextpe->nama_group;
              $groupid=$nextpe->id_groups;
        }
            


        if($groupname !='manager'){

            $select_penerima_baru=$this->Pengajuan_model->select_penerima_baru($groupid);
            foreach($select_penerima_baru as $pem){
             $nex_penerima=$pem->id;
             $nex_email[]=$pem->email;
            }

        }else{
        // jika iya
          $select_line_manajer=$this->Pengajuan_model->user_by_id($id_penerima);
          foreach($select_line_manajer as $sel){
          $nex_penerima=$sel->id_line_manajer;
          }
        }

         // cek riwayat PR terakhir

        if($jumlah_penerima==0){
            $ket="Selesai";
        }
        $cek_terakhir=$this->User_pengajuan_model->cek_history_terakhir_pr($id_pengajuan);
        foreach($cek_terakhir as $c){
            $id_history=$c->id_history;
        }
       
        $foto = $_FILES['foto']['name'];

       

        if($foto){
        $str = date('Y-m');
        $date = explode("-",$str);
        $ds = "/";
        $storeFolder = './files/pengajuan/'.$groupname."/";


        $foto_name = str_replace(" ", "_", $foto);
        $targetPath = $storeFolder . $ds . $date[0] . $ds .$date[1] . $ds;
                



        $config['upload_path'] = './files/pengajuan/';



        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xls|xlsx|csv';
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
       }

        $this->Pengajuan_model->update_pengajuan_new($next_penerima,$id_pengajuan,$status_approval,$id_penerima);    
        $this->Pengajuan_model->update_history_pengajuan_new($status_approval,$id_history,$tanggal_persetujuan,$id_penerima,$ket,$foto_name);
        
        $total_belanjaa=$this->Pengajuan_model->select_sum_belanja($id_pengajuan);

        $ppn=$this->Pengajuan_model->select_ppn($id_pengajuan);

        foreach($ppn as $p){
            $persen_ppn=$p->ppn;
            $total_awal=$p->total_awal;
            $total_pajak=$p->total_pajak;
        }

        if($persen_ppn){
                $total_belanja=$total_awal-$total_pajak;
        }else{
              $total_belanja=$total_awal;
        }
        
        if($jumlah_penerima==0){

         $ket="Selesai";
         $finance=$this->User_pengajuan_model->select_finance();
                foreach($finance as $fin){
                    $email_financen[]=$fin->email;
                }
                 $this->kirim_email_finance($email_financen, $id_pengajuan,$total_belanja,$foto_name);
                 $this->kirim_email($nex_email,$id_pengajuan,$total_belanja);
        }elseif($jumlah_penerima > 0 and $status_approval==1){

            $this->Pengajuan_model->insert_history_pengajuan_new($id_pengajuan,'',$nex_penerima,$next_penerima,'0',$groupid);
                       
            if($groupname=="Purchasing" or $groupname=="purchasing"){
                $finance=$this->User_pengajuan_model->select_finance();
                foreach($finance as $fin){
                    $email_financen[]=$fin->email;
                }
                 $this->kirim_email_finance($email_financen, $id_pengajuan,$total_belanja,$foto_name);
                 $this->kirim_email($nex_email,$id_pengajuan,$total_belanja);

            }else{
                 $this->kirim_email_penerima($nex_email, $id_pengajuan,$total_belanja);
            }
        }
    
          $this->kirim_email_pembuat($email_pengirim, $id_pengajuan,$total_belanja);
        
        redirect('history-persetujuan','Refresh');

    }


 function ajukan_kembali(){
    $id_pengajuan=$this->input->get('id_pengajuan');

    $ID= $this->ion_auth->user()->row()->id;
     
    $pengajuan=$this->Pengajuan_model->select_pengajuan($id_pengajuan);
    foreach($pengajuan as $pen){

        $no_pengajuan=$pen->no_pengajuan;
        $tanggal_pengajuan =$pen->tanggal_pengajuan;
        $id_jenis_request =$pen->id_jenis_request;
        $keterangan     =$pen->keterangan;
        $tanggal_required =$pen->tanggal_required;
        $tujuan =$pen->tujuan;
         $id_user =$pen->id_user;

    }


    $data['jenis_request']=$this->Pengajuan_model->select_jenis_request();

    $cek_jumlah_group_users=$this->Pengajuan_model->cek_jumlah_group_users($id_user);
 if($cek_jumlah_group_users==1){
        $cek_level_user     = $this->Pengajuan_model->cek_users($id_user);
        foreach($cek_level_user as $rows){
              $group=$rows->name;
              $id_groups=$rows->id_groups;
              $email_pembuat=$rows->email;
              $id_line_manajer=$rows->id_line_manajer;
        }

        // jika punya lebih dari 1
        }else{
         $cek_group_users=$this->Pengajuan_model->cek_group_users($ID);
         foreach ($cek_group_users as $m) :
         $as[]=$m->group_id;
         ",";
        endforeach;

 $jabs = count($as)-1;   
$value = $as;
$ranking = array();
foreach ($value as $k => $v){
    array_push($ranking, $v);
}

for ($a = 0; $a <= $jabs; $a ++) {

  $id_g=$as[$a]; 
  
$cekurutan=$this->Pengajuan_model->cekrule($id_jenis_request,$id_g);
        foreach($cekurutan as $ceks):
             $urutan_array[]=$ceks->urutan;
        endforeach;

}

$MAX_VALUE=200;
    $a=$urutan_array;
    for($i=0;$i<count($a) ;$i++){
             if($a[$i] < $MAX_VALUE){
                 $MAX_VALUE=$a[$i];
             }

}
$urutan_d= $MAX_VALUE;
$cek_id_groups=$this->Pengajuan_model->nextrule($id_jenis_request,$urutan_d);
foreach($cek_id_groups as $gr){

    $id_groups=$gr->id_groups;
}

}


 /////////////////////////

if($id_jenis_request==1){
            $total_belanjaa=$this->Pengajuan_model->total_belanja($id_pengajuan);

            foreach($total_belanjaa as $tot){
                $total_belanja=$tot->tharga;
            }
            $aturan=$this->Pengajuan_model->select_aturan($id_jenis_request);

            if(count($aturan>0)){
            foreach($aturan as $row){
                $batas_atas=$row->batas_atas;
              }
            }
            if($total_belanja > $batas_atas){
              $id_jenis_request=3;
            }else{
              $id_jenis_request=1;
            }

        }
        // Selesai Permintaan Barang
        $total_belanjaa=$this->Pengajuan_model->total_belanja($id_pengajuan);

            foreach($total_belanjaa as $tot){
                $total_belanja=$tot->tharga;
            }
        // Cek Rule
        $cekrule=$this->Pengajuan_model->cekrule($id_jenis_request,$id_groups);
        foreach($cekrule as $cek){
             $urutan=$cek->urutan;
        }

        $next_urutan=$urutan+1;
        $nextrule=$this->Pengajuan_model->nextrule($id_jenis_request,$next_urutan);
        foreach($nextrule as $next){
              $namagroup=$next->nama_group;
              $id_groups=$next->id_groups;
        }


      

        // cek user penerima
        /*
        if($urutan==1 and $namagroup=="manager"){
           $cek_penerima=$this->Pengajuan_model->select_manajer($ID);
          foreach ($cek_penerima as $ce) {
              $id_penerima=$ce->id_line_manajer;
              

          }
          $cek_email_penerima=$this->Pengajuan_model->select_manajer($id_penerima);
          foreach ($cek_email_penerima as $c) {
              $email_penerima[]=$c->email;
          }
          
        }else{
              $cek_penerimaa=$this->Pengajuan_model->select_penerima($id_groups);
              foreach ($cek_penerimaa as $cem) {
              $id_penerima=$cem->user_id;
              $email_penerima[]=$cem->email;

          }
        }

va*/

  if($urutan==1 and $namagroup=="manager"){
            $next=1;

         



              if($id_line_manajer !=0){
                
           

                      $cek_penerima=$this->Pengajuan_model->select_manajer($ID);
                      foreach ($cek_penerima as $ce) {
                             $id_penerima=$ce->id_line_manajer;
                         }



                         

                       $cek_email_penerima=$this->Pengajuan_model->select_manajer($id_penerima);
                       foreach ($cek_email_penerima as $c):
                               $email_penerima[]=$c->email;
                               /*
                               
                               $this->kirim_email_penerima($email_penerima, $last_insert_id,$total_belanja,$foto_name);
                               */
                        endforeach;

           
              }elseif($id_line_manajer==0 or $id_line_manajer==NULL){
               $next=$urutan+2;

               

               $nextrules=$this->Pengajuan_model->nextrule($id_jenis_request,$next);
                    foreach($nextrules as $nexts){
                          $namagroups=$nexts->nama_group;
                          $id_groupss=$nexts->id_groups;
                          }
              $cek_penerimaa_n=$this->Pengajuan_model->select_penerima($id_groupss);
                   foreach ($cek_penerimaa_n as $cemn) {
                          $id_penerima=$cemn->user_id;
                          $email_penerima[]=$cemn->email;
                          /*
                          $this->kirim_email_penerima($email_penerima, $last_insert_id,$total_belanja,$foto_name);
                          */
                         }
              }
              

        }elseif($urutan !=1 and $namagroup !='manager'){
               

              $cek_penerimaa=$this->Pengajuan_model->select_penerima($id_groups);
              foreach ($cek_penerimaa as $cem) {
                 $id_penerima=$cem->user_id;
                 $email_penerima[]=$cem->email;
                 /*
                 $this->kirim_email_penerima($email_penerima, $last_insert_id,$total_belanja,$foto_name);
                 */
                 }

        }elseif($urutan==1 and $namagroup !='manager'){
               $urutan=$urutan+2;
               $next=$urutan+2;
               $nextrules=$this->Pengajuan_model->nextrule($id_jenis_request,$urutan);
                    foreach($nextrules as $nexts){
                          $namagroups=$nexts->nama_group;
                          $id_groups=$nexts->id_groups;
                          }
              $cek_penerimaa_n=$this->Pengajuan_model->select_penerima($id_groups);
                   foreach ($cek_penerimaa_n as $cemn) {
                          $id_penerima=$cemn->user_id;
                          $email_penerima[]=$cemn->email;
                          /*
                          $this->kirim_email_penerima($email_penerima, $last_insert_id,$total_belanja,$foto_name);
                          */
                    }

        }


       $total_belanjaa=$this->Pengajuan_model->select_sum_belanja($id_pengajuan);
        $ppn=$this->Pengajuan_model->select_ppn($id_pengajuan);

 foreach($ppn as $p){
            $persen_ppn=$p->ppn;
            $grand_total=$p->grand_total;
        }



        if($persen_ppn){
            $total_belanja=$grand_total;
        }else{

        foreach($total_belanjaa as $tot){
            $total_belanja=$tot->tharga;
        }
        
        }


         
        //insert data dan kirim email ke penerima
        /*
        $this->Pengajuan_model->insert_alokasi($id_gedung,$id_
*/

        $this->Pengajuan_model->update_pengajuan_new($next_urutan,$id_pengajuan,$status_approval,$approve_by);

        $this->Pengajuan_model->insert_history_pengajuan_new($id_pengajuan,'', $id_line_manajer,$urutan,'0',$id_groups);


 $this->kirim_email_penerima($email_penerima, $id_pengajuan,$total_belanja);
        // kirim email ke pembuat untuk konfirmasi  status persetujuan 
         $this->kirim_email_pembuat($email_pembuat, $id_pengajuan,$total_belanja);
         $this->cart->destroy();
         $this->session->unset_userdata('users');
         echo $this->session->set_flashdata('message', '<div class="alert alert-info"><b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Permintaan berhasil diajukan kembali dengan nomor 
              ' .$no_pengajuan.' 
            </b></div>');
         redirect('daftar-permintaan','refresh');

     }


   /*
   function ajukan_kembali(){
    $id_pengajuan=$this->input->get('id_pengajuan');
     
    $pengajuan=$this->Pengajuan_model->select_pengajuan($id_pengajuan);
    foreach($pengajuan as $pen){

        $no_pengajuan=$pen->no_pengajuan;
        $tanggal_pengajuan =$pen->tanggal_pengajuan;
        $id_jenis_request =$pen->id_jenis_request;
        $keterangan     =$pen->keterangan;
        $tanggal_required =$pen->tanggal_required;
        $tujuan =$pen->tujuan;
         $id_user =$pen->id_user;

    }


    $data['jenis_request']=$this->Pengajuan_model->select_jenis_request();

    $cek_jumlah_group_users=$this->Pengajuan_model->cek_jumlah_group_users($id_user);
 if($cek_jumlah_group_users==1){
        $cek_level_user     = $this->Pengajuan_model->cek_users($id_user);
        foreach($cek_level_user as $rows){
              $group=$rows->name;
              $id_groups=$rows->id_groups;
              $email_pembuat=$rows->email;
              $id_line_manajer=$rows->id_line_manajer;
        }

        // jika punya lebih dari 1
        }else{
         $cek_group_users=$this->Pengajuan_model->cek_group_users($ID);
         foreach ($cek_group_users as $m) :
         $as[]=$m->group_id;
         ",";
        endforeach;

 $jabs = count($as)-1;   
$value = $as;
$ranking = array();
foreach ($value as $k => $v){
    array_push($ranking, $v);
}

for ($a = 0; $a <= $jabs; $a ++) {

  $id_g=$as[$a]; 
  
$cekurutan=$this->Pengajuan_model->cekrule($id_jenis_request,$id_g);
        foreach($cekurutan as $ceks):
             $urutan_array[]=$ceks->urutan;
        endforeach;

}

$MAX_VALUE=200;
    $a=$urutan_array;
    for($i=0;$i<count($a) ;$i++){
             if($a[$i] < $MAX_VALUE){
                 $MAX_VALUE=$a[$i];
             }

}
$urutan_d= $MAX_VALUE;
$cek_id_groups=$this->Pengajuan_model->nextrule($id_jenis_request,$urutan_d);
foreach($cek_id_groups as $gr){

    $id_groups=$gr->id_groups;
}

}


 /////////////////////////

if($id_jenis_request==1){
            $total_belanjaa=$this->Pengajuan_model->total_belanja($id_pengajuan);

            foreach($total_belanjaa as $tot){
                $total_belanja=$tot->tharga;
            }
            $aturan=$this->Pengajuan_model->select_aturan($id_jenis_request);

            if(count($aturan>0)){
            foreach($aturan as $row){
                $batas_atas=$row->batas_atas;
              }
            }
            if($total_belanja > $batas_atas){
              $id_jenis_request=3;
            }else{
              $id_jenis_request=1;
            }

        }
        // Selesai Permintaan Barang
        $total_belanjaa=$this->Pengajuan_model->total_belanja($id_pengajuan);

            foreach($total_belanjaa as $tot){
                $total_belanja=$tot->tharga;
            }
        // Cek Rule
        $cekrule=$this->Pengajuan_model->cekrule($id_jenis_request,$id_groups);
        foreach($cekrule as $cek){
             $urutan=$cek->urutan;
        }

        $next_urutan=$urutan+1;
        $nextrule=$this->Pengajuan_model->nextrule($id_jenis_request,$next_urutan);
        foreach($nextrule as $next){
              $namagroup=$next->nama_group;
              $id_groups=$next->id_groups;
        }
        // cek user penerima
        if($urutan==1 and $namagroup=="manager"){
           $cek_penerima=$this->Pengajuan_model->select_manajer($ID);
          foreach ($cek_penerima as $ce) {
              $id_penerima=$ce->id_line_manajer;
          }
          $cek_email_penerima=$this->Pengajuan_model->select_manajer($id_penerima);
          foreach ($cek_email_penerima as $c) {
              $email_penerima=$c->email;
          }
          
        }else{
              $cek_penerimaa=$this->Pengajuan_model->select_penerima($id_groups);
              foreach ($cek_penerimaa as $cem) {
              $id_penerima=$cem->user_id;
              $email_penerima=$cem->email;

          }
        }

        $this->Pengajuan_model->insert_history_pengajuan_new($id_pengajuan,'', $id_line_manajer,$urutan);


 $this->kirim_email_penerima($email_penerima, $last_insert_id,$total_belanja);
        // kirim email ke pembuat untuk konfirmasi  status persetujuan 
         $this->kirim_email_pembuat($email_pembuat, $last_insert_id,$total_belanja);
         $this->cart->destroy();
         $this->session->unset_userdata('users');
         echo $this->session->set_flashdata('message', '<div class="alert alert-info"><b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Permintaan berhasil diajukan kembali dengan nomor 
              ' .$no_pengajuan.' 
            </b></div>');
         redirect('daftar-permintaan','refresh');

     }


     */
/*
     public function simpan_keputusan_email(){

        $status_approval      = $this->input->get('status_approval');
        $email                = $this->input->get('email');
        $id_pengajuan         = $this->input->get('id_pengajuan');
        $id_pengirim          = $this->input->get('id_pengirim');

        $email_peng=$this->Pengajuan_model->select_email_pengirim($id_pengirim);
        foreach($email_peng as $peng){
            $email_pengirim=$peng->email;
        }
        


        $id_jenis_request     = $this->input->get('id_jenis_request');
        $urutan               = $this->input->get('urutan');
        $tanggal_persetujuan     =date('Y-m-d');
         $cek_user_email=$this->Pengajuan_model->cek_user_email($email);
         foreach($cek_user_email as $ce){

             $approve=$ce->id;

         }

           $approve_by=$approve;

           

       
        $detail_permintaan=$this->Pengajuan_model->select_pengajuan_detail($id_pengajuan);
        foreach($detail_permintaan as $deta){

            $id_user_approv=$deta->id_user_approval;
            $ket_approv=$deta->ket;

        }
             

        if($approve_by==$id_user_approv){


   redirect('Pengajuan/gagal');

        }else{


       $cek_terakhirr=$this->Pengajuan_model->cek_status_terakhir($id_pengajuan);
        foreach($cek_terakhirr as $cc){
            $urutan=$cc->urutan;
        }

       $next_urutan=$urutan+1;
       $nextrule=$this->Pengajuan_model->nextrule($id_jenis_request,$next_urutan);
       foreach($nextrule as $next){
              $namagroup=$next->nama_group;
              $id_groups=$next->id_groups;
        }
            
    
        $next_penerima=$next_urutan+1;
        $nextpenerima=$this->Pengajuan_model->nextrule($id_jenis_request,$next_penerima);


        $jumlah_penerima=count($nextpenerima);
        

        
       foreach($nextpenerima as $nextpe){
              $groupname=$nextpe->nama_group;
              $groupid=$nextpe->id_groups;
        }
            
        $select_penerima_baru=$this->Pengajuan_model->select_penerima_baru($groupid);
         foreach($select_penerima_baru as $pem){
            $nex_penerima=$pem->id;
            $nex_email=$pem->email;
         }

         // cek status terakhir


         $cek_terakhir=$this->Pengajuan_model->cek_status_terakhir($id_pengajuan);
        foreach($cek_terakhir as $c){
            $id_history=$c->id_history;
        }

         

        $this->Pengajuan_model->update_pengajuan_new($next_urutan,$id_pengajuan,$status_approval,$approve_by);

           

         if($jumlah_penerima==0){
            $ket="Selesai";
        }

        $this->Pengajuan_model->update_history_pengajuan_new($status_approval,$id_history,$tanggal_persetujuan,$approve_by,$ket);

        if($jumlah_penerima > 0 and $status_approval==1){
         $this->Pengajuan_model->insert_history_pengajuan_new($id_pengajuan,'',$nex_penerima,$next_urutan,'0');
         


         }

         

        $total_belanjaa=$this->Pengajuan_model->select_sum_belanja($id_pengajuan);
        foreach($total_belanja as $tot){
            $total_belanjaa=$tot->tharga;
        }
      
          if($jumlah_penerima > 0){
        $this->kirim_email_penerima($nex_email, $id_pengajuan,$total_belanjaa);
        }

        $this->kirim_email_pembuat($email_pengirim, $id_pengajuan,$total_belanjaa);
        redirect('Pengajuan/berhasil','Refresh');
       }
       

     }

*/
     function berhasil(){

     	$this->load->view('berhasil');
     }




      function gagal(){

        echo "Link telah kadaluarsa !";
     }


     function lakukan_download($id_permintaan){

     $this->load->helper('download');
      $nama_file=$this->Pengajuan_model->cek_nama_file($id_permintaan);
      foreach($nama_file as $nam){

        $filen=$nam->lampiran;
      }

      $file = 'files/pengajuan/'.$filen;
    force_download($file, NULL);
        

     }

     function lakukan_download_nota($id_permintaan){

     $this->load->helper('download');
      $nama_file=$this->Pengajuan_model->cek_nama_file($id_permintaan);
      foreach($nama_file as $nam){

        $filen=$nam->nota;
      }

      $file = 'files/pengajuan/'.$filen;
    force_download($file, NULL);
        

     }

     function lakukan_download_history($id_permintaan){

     $this->load->helper('download');
      $nama_file=$this->Pengajuan_model->cek_nama_file_history($id_permintaan);
      foreach($nama_file as $nam){

        $filen=$nam->lampiran;
      }

      $file = 'files/pengajuan/'.$filen;
    force_download($file, NULL);
        

     }





     function add_ajax_divisi($id_gedung){
     
     $query = $this->Pengajuan_model->select_divisi_gedung($id_gedung);
     $data = "<option value=''>- Pilih Divisi -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id_divisi."'>".$value->nama_divisi."</option>";
        }
        echo $data;
    }



   
     function simpan_nota(){

        $id_pengajuan=$this->input->post('id_pengajuan');
        $id_user=$this->input->post('id_user');
    $foto = $_FILES['foto']['name'];

        $foto_name = str_replace(" ", "_", $foto);

        $config['upload_path'] = './files/pengajuan/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xls|xlsx|csv';
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
        $this->Pengajuan_model->update_nota($id_pengajuan,$foto_name);

         $total_belanjaa=$this->Pengajuan_model->select_sum_belanja($id_pengajuan);
        foreach($total_belanjaa as $tot){
            $total_belanja=$tot->tharga;
        }
      
        $select_user_grup=$this->Pengajuan_model->select_grup('16');

        foreach($select_user_grup as $us):
            $email_penerima=$us->email;
            $id_groups=$us->group_id;

           

        $this->kirim_email_nota($email_penerima,$id_pengajuan,$total_belanja,$foto_name,$id_groups);
        endforeach;

         $select_user_grupp=$this->Pengajuan_model->select_grup('17');


         foreach($select_user_grupp as $use):
            $email_penerimas=$use->email;
            $id_groupss=$use->group_id;

           

        $this->kirim_email_nota($email_penerimas,$id_pengajuan,$total_belanja,$foto_name,$id_groupss);
        endforeach;

         redirect('daftar-permintaan');

     }

    

     function kirim_email_nota($email,$last_insert_id,$total_belanja,$foto_name="",$id_groups=""){

         $your_file="Cepatlakoo-Dokumentasi.pdf";
         $this->load->helper('path');
$path = set_realpath('./files/pengajuan');
        $tot=number_format($total_belanja);
        $ID = $this->ion_auth->user()->row()->id;
        $permintaan_ajuan=$this->Pengajuan_model->select_pengajuan_detail($last_insert_id);
    
        $data['permintaan']=$this->Pengajuan_model->detail_barang_per_id($last_insert_id);
        $data['email']=$email;
        $data['id_pengirim']=$ID;
        $data['id_pengajuan']=$last_insert_id;

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
             $data['id_user_approval']=$per->id_user_approval;
             $data['status_user']=$per->status_user;
             $data['id_jenis_request']=$per->id_jenis_request;
             $data['ket']=$per->ket;
            $data['lampiran']=$per->lampiran;
            $data['tujuan']=$per->tujuan;
            $data['metode_pembayaran']=$per->metode_pembayaran;
            $data['ppn']=$per->ppn;
            $data['grand_total']=$per->grand_total;
             $nomor_pengajuan=$per->no_pengajuan;

             $tgl_pengajuan=$per->tanggal_pengajuan;
              $id_pengajuan=$per->id_pengajuan;
         }

    $data['vendor']=$this->Pengajuan_model->select_vendor($id_pengajuan);
     $data['asu']='ase';
     $this->load->library('email');
     $data['pengajuan']=$this->Pengajuan_model->select_pengajuan_by_no($last_insert_id);
     $message = $this->load->view('email_baru/konfirmasi_finance',$data, TRUE);
     $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
     $this->email->to($email); 
     
  $this->email->cc('leni@aartijaya.com');
     $this->email->bcc('teni_rachmawati@aartijaya.com');
     
     $this->email->subject('Nota Permintaan (#'.$nomor_pengajuan.') - (Rp'.$tot.')- ('.$tgl_pengajuan.')');
     $this->email->message($message);
    /*
     $this->email->attach('http://localhost/approval_id/files/pengajuan/IMG_9840.jpg');
     */
     if($foto_name){
     $this->email->attach('http://portal.aartijaya.com/files/pengajuan/'.$foto_name);
     }
     
     $this->email->send();
     redirect('daftar-permintaan');
     

  }

   function daftar_nota(){
        $data['daftar_nota']=$this->Pengajuan_model->select_pengajuan_nota();
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('daftar_nota',$data);
        $this->load->view('layouts/footer');

     }


   function kirim_email_finance($email,$last_insert_id,$total_belanja,$foto_name=""){

        $count_email=count($email);
        $tot=number_format($total_belanja);
        $ID = $this->ion_auth->user()->row()->id;
        $permintaan_ajuan=$this->Pengajuan_model->select_pengajuan_detail($last_insert_id);
    
        $data['permintaan']=$this->Pengajuan_model->detail_barang_per_id($last_insert_id);
        $data['email']=$email;
        $data['id_pengirim']=$ID;
        $data['id_pengajuan']=$last_insert_id;

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
             $data['id_user_approval']=$per->id_user_approval;
             $data['status_user']=$per->status_user;
             $data['id_jenis_request']=$per->id_jenis_request;
             $data['ket']=$per->ket;
             $data['lampiran']=$per->lampiran;
             $data['tujuan']=$per->tujuan;
             $data['metode_pembayaran']=$per->metode_pembayaran;
             $data['ppn']=$per->ppn;
             $data['nama_gedung']=$per->nama_gedung;
             $data['grand_total']=$per->grand_total;
             $nomor_pengajuan=$per->no_pengajuan;

             $tgl_pengajuan=$per->tanggal_pengajuan;
             $id_pengajuan=$per->id_pengajuan;
         }

     $data['vendor']=$this->Pengajuan_model->select_vendor($id_pengajuan);
     $data['history']=$this->Pengajuan_model->history_pengajuan($id_pengajuan);
     $data['asu']='ase';
     $this->load->library('email');
     $data['pengajuan']=$this->Pengajuan_model->select_pengajuan_by_no($last_insert_id);
     $i=0;
     while ($i <= $count_email)
    {
      $email_asli=$email[$i];
      $data['email_asli']=$email_asli;
      $message = $this->load->view('email_baru/konfirmasi_finance',$data, TRUE);
      $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
      $this->email->to($email_asli); 
      $this->email->subject('Pengajuan Permintaan Baru (#'.$nomor_pengajuan.') - (Rp'.$tot.')- ('.$tgl_pengajuan.')');
      $this->email->message($message);
        if($foto_name){
          $this->email->attach('<?php echo base_url(); ?>/files/pengajuan/'.$foto_name);
        }
      $this->email->send();
    $i=$i+1;
    }
  }

function kirim_email($email,$id_pengajuan,$total_belanja){
        $email=$email;
        

        $count_email=count($email);
        $this->load->library('email');
        $i=0;
        while ($i <= $count_email)
         { $email_asli=$email[$i];

        $data['email_asli']=$email_asli;
        $message = $this->load->view('email_permintaan/notif_pic',$data, TRUE);
        $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
        $this->email->to($email_asli);
        $this->email->subject('Pengajuan Permintaan Barang Baru (#'.$first_name.') - ('.$last_name.')');
        $this->email->message($message); 
        $this->email->send();
        $i=$i+1;
    }

  }



   // mengirim email kepada pembuat permintaan
  function kirim_email_pembuat($email,$last_insert_id,$total_belanja,$foto_name=""){
     

        $tot=number_format($total_belanja);
        $permintaan_ajuan=$this->Pengajuan_model->select_pengajuan_detail($last_insert_id);
        $data['permintaan']=$this->Pengajuan_model->detail_barang_per_id($last_insert_id);
        $data['email']=$email;
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
            $data['nama_gedung']=$per->nama_gedung;
             $data['id_pengirim']=$per->id_user;
            $data['id_jenis_request']=$per->id_jenis_request;
            $data['keterangan']=$per->keterangan;
            $data['last_status']=$per->last_status;
            $data['id_user_approval']=$per->id_user_approval;
            $data['status_user']=$per->status_user;
            $data['ket']=$per->keterangan;
            $data['lampiran']=$per->lampiran;
            $data['tujuan']=$per->tujuan;
             $data['metode_pembayaran']=$per->metode_pembayaran;
            $data['ppn']=$per->ppn;
            $data['grand_total']=$per->grand_total;
             $data['tipe_pajak']=$per->tipe_pajak;
            $data['total_awal']=$per->total_awal;
            $data['total_pajak']=$per->total_pajak;
            $nama_manajer=$per->id_user_approval;
            $nomor_pengajuan=$per->no_pengajuan;
            $tgl_pengajuan=$per->tanggal_pengajuan;
             $id_pengajuan=$per->id_pengajuan;
        }
          $data['vendor']=$this->Pengajuan_model->select_vendor($id_pengajuan);

     $this->load->library('email');
     $message = $this->load->view('email_new/email_view_invoice',$data, TRUE);
     $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
     $this->email->to($email); 
     $this->email->subject('Konfirmasi Status Permintaan (#'.$nomor_pengajuan.') - (Rp'.$tot.')- ('.$tgl_pengajuan.')');
     $this->email->message($message);
     if($foto_name){
     $this->email->attach('http://portal.aartijaya.com/files/pengajuan/'.$foto_name);
     }
     $this->email->send();
     
  }

}
