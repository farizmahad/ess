<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

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


    public function __construct()
    {

        parent::__construct();
        $this->load->model('user_pengajuan_model');
        $this->load->helper('tgl_indo');
        $this->load->model('Pengajuan_model');
        $this->load->model('toko_model');
        $this->load->model('ion_auth_model');
        $this->load->library('cart');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library('upload');
        $this->load->helper('download');
        $this->load->library('excel');
        $apikey='?apikey=64c9bc94ff52e54a9f1c55229c852c36';

        
    }

	

  public function daftar_konfirmasi_produk(){

        if (!$this->ion_auth->logged_in()){ redirect('login');}
        $group_manager         = array('manager');
        $group_kepala_regional = array('kepala regional');
        if ($this->ion_auth->in_group($group_manager)){ 
            $draft="4";
        }elseif ($this->ion_auth->in_group($group_kepala_regional)) {
            $draft="5";
        }
        $ID= $this->ion_auth->user()->row()->id;
        $data['title']="Daftar Konfirmasi Produk";
        $data['daftar_permintaan_barang']=$this->toko_model->daftar_konfirmasi_produk_toko($ID,$draft);
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('toko/daftar_konfirmasi_toko',$data);
        $this->load->view('layouts/footer');
  }



  public function simpan_konfirmasi_toko(){

    $id_kacab_regional = $this->ion_auth->user()->row()->id;
    $id_detail=$this->input->post('id_detail');
    $status   =$this->input->post('status');
    $draft    =$this->input->post('draft');
    $tanggal_konfirmasi = date('Y-m-d');
    $id_user    =$this->input->post('id_user');


    $updateArray = array();

      for($x = 0; $x < sizeof($id_detail); $x++){
        $id_detail_barang=$id_detail[$x];
        $status_konfirmasi=$status[$x];
        $user=$id_user[$x];

        $draft_konfirmasi=$draft[$x];
        if($draft_konfirmasi=="4"){
           $groupid="15";
           $urutan="2";
        }elseif($draft_konfirmasi=="5"){
           $groupid="23";
           $urutan="3";
        }


      $updateArray[] = array(
        'id_detail' =>$id_detail[$x],
        'draft'     =>$status[$x],
        'groupid'   =>$groupid

    );

     
      
    
      $insertArray[] = array(
        'id_pengajuan' =>$id_detail[$x],
        'status_history'     =>3,
        'status'     =>$status[$x],
        'groupid'   =>$groupid,
        'id_user_approval'   =>$id_kacab_regional,
        'tanggal'   =>$tanggal_konfirmasi

    );



     if($status_konfirmasi=="5"){
       $datas=array(
            'id'=>$id_detail[$x],
            'name'=>'as',
            'qty'=>'3',
            'price'=>'50000',
            'draft'=>$status[$x],
            'groupid'=>$groupid,
            'id_kacab_regional'=>$id_kacab_regional,
             'id_user'=>$user,
            
        );

       }
      

      if($status_konfirmasi==0){


      $cek_detail_barang    = $this->User_pengajuan_model->cek_detail_barang_user($id_detail_barang);

       foreach($cek_detail_barang as $ce){
            $id_user=$ce->id_user;
            $id_kategori[]=$ce->id_kategori_barang;
            $kategori[]=$ce->id_kategori_barang;

       }

        $cek_pic_kategori=$this->user_pengajuan_model->cek_pic_kategori_id($id_kategori);
        foreach($cek_pic_kategori as $row){
          $id_pic[]=$row->id;
          $email_pic[] =$row->email;
          $firstname_pic =$row->first_name;
          $lastname_pic  =$row->last_name;
          $pic_id=$row->id;
        }
        
         $this->kirim_email_pic($id_pic,$email_pic,$id_user,$id_detail_barang,$firstname_pic,$lastname_pic);
/*
         if($pic_id=="82"){
             
              $tampil_daftar_kategori=$this->toko_model->tampil_daftar_kategori('82');
              foreach($tampil_daftar_kategori as $ros){
                       $id_kategori_barangs[]=$ros->id_kategori_barang;

                        
               $id_pengirim=$id_user;
               /*
               $cek_user_lengkap=$this->toko_model->tampil_user_lengkap($id_pengirim);
               foreach($cek_user_lengkap as $do){
                  $nama_divisi=$do->nama_divisi;
               }
               */
               /*
               $code_otomatis=$this->user_pengajuan_model->cek_divisi_user($id_pengirim);
               

          }



/*              
$array=array('82','10','100');
if (in_array($id_kategori, $id_kategori_barangs)) {
    

    $this->Toko_model->tambah_purchase_request();


     

} 
     */            
            



/*
         }
        */


        
       }


    }

    
         if($pic_id=="82"){
             
              $tampil_daftar_kategori=$this->toko_model->tampil_daftar_kategori('82');
              foreach($tampil_daftar_kategori as $ros){
                       $id_kategori_barangs[]=$ros->id_kategori_barang;

              $TampungArray = array_diff($kategori,$id_kategori_barangs);


        
               
               /*
               $cek_user_lengkap=$this->toko_model->tampil_user_lengkap($id_pengirim);
               foreach($cek_user_lengkap as $do){
                  $nama_divisi=$do->nama_divisi;
               }
               */

          }


        }
    $this->db->insert_batch('history_pengajuan', $insertArray);
    $this->db->update_batch('detail_pengajuan' , $updateArray , 'id_detail' );
    $this->cart->insert($datas);
    /*
         $an=$this->cart->contents();
         var_dump($an);
         die;
         */

         if($status_konfirmasi=="5"){
         $this->kirim_email_kacab($id_user,$id_detail);
         }



/*
    if($pic_id=="82"){
           $id_pengirim=$id_user;
           $code_otomatis=$this->user_pengajuan_model->cek_divisi_user($id_pengirim);
           $tanggal_pengajuan=date('Y-m-d');
           $tanggal_dibutuhkan=date('Y-m-d');
           $id_jenis_request="1";
           $id_gedung="5";
           $this->user_pengajuan_model->insert_permintaan($code_otomatis,$tanggal_pengajuan,$tanggal_dibutuhkan,$id_jenis_request,$foto_name,$id_gedung,$keterangan,$id_pengirim,'0');

           $last_insert_id=$this->user_pengajuan_model->cek_id_pengajuan_terakhir();
           foreach($last_insert_id as $do){
             $id_terakhir = $do->id_pengajuan;
           }

      $insertPurchaseRequest = array();
      for($x = 0; $x < sizeof($id_detail); $x++){
      $insertPurchaseRequest[] = array(
        'id_detail'        =>$id_detail[$x],
        'id_pengajuan'     =>$id_terakhir,
        'draft       '     =>'0',
        'groupid       '     =>'16'
      );

      $this->db->update_batch('detail_pengajuan' , $insertPurchaseRequest , 'id_detail' );
      }

      $id_groupss="16";
      $urutan_selanjutnya="3";
      $this->Pengajuan_model->insert_history_pengajuan_new($id_pengajuan,'','',$urutan_selanjutnya,'',$id_groupss);

    }
    
    */
    redirect('Toko/daftar_konfirmasi_produk');

  }


  function riwayat_konfirmasi_produk($status){

    $ID = $this->ion_auth->user()->row()->id;

    if($status=="diterima"){
      $data['title']="Riwayat Konfirmasi Produk diterima";
    }elseif($status=="direvisi"){
      $data['title']="Riwayat Konfirmasi Produk direvisi";
    }elseif($status=="ditolak"){
      $data['title']="Riwayat Konfirmasi Produk ditolak";
    }
    $data['daftar_permintaan_barang']=$this->toko_model->daftar_riwayat_konfirmasi_toko($ID,$status);
    $this->load->view('layouts/header',$data);
    $this->load->view('layouts/sidebar');
    $this->load->view('toko/riwayat_konfirmasi_toko',$data);
    $this->load->view('layouts/footer');

  }

  function kirim_email_kacab($id_user,$id_detail){
    /*
   $line_manajer=$this->user_pengajuan_model->cek_line_manajer($id_user);
            foreach($line_manajer as $row){
                  $id_line_manajer=$row->id_line_manajer;
                  $id_divisi      =$row->id_divisi;
                  $status_rule    =$row->status_rule;
                  $first_name     =$row->first_name;
                  $nama_divisi    =$row->nama_divisi;
           }
    
   $data['first_name']=$first_name;
   $data['nama_divisi']=$nama_divisi;
   */


    
   $data['detail_produk']=$id_detail;
   $data['product']=$this->cart->contents();
    foreach($this->cart->contents() as $on){
          $id_detail[]=$on['id'];
          $draft=$on['draft'];
          $id_kacab_regional=$on['id_kacab_regional'];
           $id_user=$on['id_user'];
    }

     

    $detail_produk=$this->toko_model->daftar_detail_produk($id_detail);
    foreach($detail_produk as $de){
      $data['kode_unik']=$de->kode_unik;
      $data['ID']=$de->id_user;
      $data['draft']=$de->draft;
    }

    
    if($draft=="4"){
      $data['urutan']="2";
      $data['$groupid']="15";
    }elseif($draft=="5"){
      $data['urutan']="3";
      $data['$groupid']="23";
    }
    $data['status']=$draft;



    $group_manager = array('manager');
    if ($this->ion_auth->in_group($group_manager)){
         $cek_kacab_regional=$this->toko_model->cek_kacab_regional($id_kacab_regional);
         foreach($cek_kacab_regional as $row){
            $id_regional=$row->id_kacab_regional;
            $nama_divisi=$row->nama_divisi;
         }
    } 
    $data['id_line_manajer']=$id_regional;
    $data['nama_divisi']=$nama_divisi;
    $detail_manajer=$this->user_pengajuan_model->cek_line_manajer($id_regional);
            foreach($detail_manajer as $row){
                $email          =$row->email;
     }




    $data['produk']=$this->toko_model->daftar_produk_email_toko($id_detail,$draft,$id_kacab_regional);

    $message = $this->load->view('email_baru/konfirmasi_kacab',$data, TRUE);
          $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
          $this->email->to($email);
          $this->email->subject('Konfirmasi Persetujuan Produk Non Dagang - Baru');
          $this->email->message($message);
          $this->email->send();
          $this->cart->destroy();
  }



  function riwayat_produk(){

    $id_detail=$this->input->post('ids');
    $data['riwayat']=$this->toko_model->riwayat_produk($id_detail);
    $data['id_detail']=$id_detail;
    $this->load->view('toko/riwayat_produk',$data);
  }
  
   function kirim_email_pic($id_pic,$email,$id_user,$last_insert_id,$firstname_pic,$lastname_pic){
        

        

        $get_users=$this->user_pengajuan_model->get_users($id_user);
          foreach($get_users as $us){
            $first_name=$us->first_name;
            $last_name =$us->last_name;
          }
        $count_email=count($email);
        $id_barang=$last_insert_id;
        $this->load->library('email');
       
        $data['first_name_pic']=$firstname_pic;
        $data['last_name_pic'] =$lastname_pic;
        $data['first_name']=$first_name;
        $data['last_name'] =$last_name;

        $i=0;
        while ($i <= $count_email)
        {
        $email_asli=$email[$i];
        $data['email_asli']=$email_asli;
        $message = $this->load->view('email_permintaan/notif_pic',$data, TRUE);
        $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
        $this->email->to($email_asli);
        $this->email->subject('Pengajuan Permintaan Produk Non Dagang - Baru (#'.$first_name.') - ('.$last_name.')');
        $this->email->message($message); 
        $this->email->send();
        $i=$i+1;
        }
    }



}
