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
/*
    echo $id_kacab_regional;
    echo "<br>";
    var_dump($id_detail);
    echo "<br>";
    var_dump($status);
    echo "<br>";
    var_dump($draft);
    echo "<br>";
    echo $tanggal_konfirmasi;
    echo "<br>";
    var_dump($id_user);
    echo "<br>";
    die;
    */




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
            $id_kategori=$ce->id_kategori_barang;
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
        /*
         $this->kirim_email_pic($id_pic,$email_pic,$id_user,$id_detail_barang,$firstname_pic,$lastname_pic);
         */

       }
    }
    $this->db->insert_batch('history_pengajuan', $insertArray);
    $this->db->update_batch('detail_pengajuan' , $updateArray , 'id_detail' );
    $this->cart->insert($datas);
  


    if($status_konfirmasi=="5"){
         $this->kirim_email_kacab($id_user,$id_detail);
         $this->kirim_notifikasi_kacab($id_user,$id_detail);
         $this->kirim_notifikasi_user($id_user,$id_detail);

    }



           if($status_konfirmasi=="0"){
             
              $tampil_daftar_kategori=$this->toko_model->tampil_daftar_kategori('82');
              foreach($tampil_daftar_kategori as $ros){
                       $id_kategori_barangs[]=$ros->id_kategori_barang;
              
              }
              $TampungArray = array_diff($kategori,$id_kategori_barangs);


  
       $id_pengirim=$id_user;
       $code_otomatis=$this->user_pengajuan_model->cek_divisi_user($id_pengirim);
       $tanggal_pengajuan=date('Y-m-d');
       $tanggal_dibutuhkan=date('Y-m-d');
       $id_jenis_request="1";
       $id_gedung=$this->user_pengajuan_model->cek_id_gedung($id_pengirim);




      $this->user_pengajuan_model->insert_permintaan($code_otomatis,$tanggal_pengajuan,$tanggal_dibutuhkan,$id_jenis_request,$foto_name,$id_gedung,$keterangan,$id_pengirim,'0');

      $last_insert_id=$this->user_pengajuan_model->cek_id_pengajuan_terakhir();

           foreach($last_insert_id as $do){
             $id_terakhir = $do->id_pengajuan;
           }

      $insertPurchaseRequest = array();
      for($x = 0; $x < sizeof($id_detail); $x++){
        $id_detail_barang=$id_detail[$x];
        $cek_detail_barang    = $this->User_pengajuan_model->cek_detail_barang_user($id_detail_barang);

        foreach($cek_detail_barang as $ro){
           $kategori_id=$ro->id_kategori_barang;
        }

      if (in_array($kategori_id, $TampungArray)) {
   
       } else {
      $insertPurchaseRequest[] = array(
        'id_detail'        =>$id_detail[$x],
        'id_pengajuan'     =>$id_terakhir,
        'draft       '     =>'0',
        'groupid       '     =>'16'
      );
      $this->db->update_batch('detail_pengajuan' , $insertPurchaseRequest , 'id_detail' );
      
      }

       
      


     }

     if($id_terakhir){
        $id_groupss="16";
        $urutan_selanjutnya="6";
        $this->Pengajuan_model->insert_history_pengajuan_new($id_terakhir,'','',$urutan_selanjutnya,'',$id_groupss);
        $finance=$this->User_pengajuan_model->select_finance();
        foreach($finance as $row){
          $email_finance[]=$row->email;
          $phone_finance[]=$row->phone;
        }

         
        $purchasing=$this->User_pengajuan_model->select_purchasing();
        foreach($purchasing as $sow){
          $email_purchasing[]=$row->email;
          $phone_purchasing[]=$row->phone;
        }


        $total_belanja=$this->User_pengajuan_model->tampil_detail_pengajuan($id_terakhir,'belum');
        foreach($total_belanja as $tot){
          $tharga_barang +=$tot->tharga;
        }

        $this->kirim_email_finance($email_finance,$id_terakhir,$tharga_barang,'','');
        $this->kirim_wa_finance($phone_finance,$id_terakhir,$tharga_barang,'','');
        $this->kirim_wa_finance($phone_purchasing,$id_terakhir,$tharga_barang,'','');

         $this->kirim_notifikasi_user($id_user,$id_detail);

      
      }

    }
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
      $data['groupid']="15";
    }elseif($draft=="5"){
      $data['urutan']="3";
      $data['groupid']="23";
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


    function wa(){
     $data = [
    'phone' => '0895350164351', // Receivers phone
    'body' => 'Hello, Andrew!', // Message
];
$json = json_encode($data); // Encode data to JSON
// URL for request POST /message
$url = 'https://eu54.chat-api.com/instance61195/message?token=66rcgkwvd4bk8md8';

/*
$url = 'https://eu54.chat-api.com/instance61195/ and token 66rcgkwvd4bk8md8';
*/
// Make a POST request
$options = stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $json
    ]
]);
// Send a request
$result = file_get_contents($url, false, $options);
    }



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
     if($foto_name){
     $this->email->attach('http://portal.aartijaya.com/files/pengajuan/'.$foto_name);
     }
     
     $this->email->send();
    
  $i=$i+1;
}

 
      
  

     
     

  }


   function kirim_email_finance($email,$last_insert_id,$total_belanja,$foto_name="",$lampiran=""){
       

        $count_email=count($email);
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
             $data['id_user_approval']=$per->id_user_approval;
             $data['status_user']=$per->status_user;
             $data['id_jenis_request']=$per->id_jenis_request;
             $data['ket']=$per->keterangan;
             $data['lampiran']=$per->lampiran;
             $data['tujuan']=$per->tujuan;
             $data['nama_gedung']=$per->nama_gedung;
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
     $this->email->subject('Pengajuan Permintaan Baru');
     $this->email->message($message);
    
/*
     $this->email->send();
     */
     $i=0;
while ($i <= $count_email)
{
  $email_asli=$email[$i];

  $data['email_asli']=$email_asli;
  $message = $this->load->view('email_baru/konfirmasi_finance',$data, TRUE);
  $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
    $this->email->to($email[$i]);
   $this->email->subject('Pengajuan Permintaan Baru (#'.$nomor_pengajuan.') - (Rp'.$tot.')- ('.$tgl_pengajuan.')');
     $this->email->message($message);
   
    
     
     if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
          
        } else {
            echo 'Error! email tidak dapat dikirim.';
            

        }
    
  $i=$i+1;
}
     

  }





   function kirim_wa_finance($notelepon,$last_insert_id,$total_belanja,$foto_name="",$lampiran=""){
       

        $count_email=count($notelepon);
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
              $nama_divisi=$per->nama_divisi;
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
             $data['nama_gedung']=$per->nama_gedung;
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
     $this->email->subject('Pengajuan Permintaan Baru');
     $this->email->message($message);
    
/*
     $this->email->send();
     */
     $i=0;
while ($i <= $count_email)
{
  
    
$key='e48201034420a5726679dc3e5bb45e4d57c7d124e3ca68b6';
           $url='http://116.203.92.59/api/send_message';
         
          $on='uncg';
          $url_link='http://demo.aartijaya.com/Toko/konfirmasi_wa_regional?id='.$ID.'&kode_unik=&groupid='.$groupid.'&urutan='.$urutan.'&draft='.$draft.'&id_kacab_regional='.$id_kacab_regional;
          $data = array(
            "phone_no"=> '62895350164351',
            "key"   =>$key,
            "message" =>'Pemberitahuan ESS - Admin '.$nama_divisi.' telah membuat Purchase request. Silakan login atau cek email '
          );
          $data_string = json_encode($data);

          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_VERBOSE, 0);
          curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
          curl_setopt($ch, CURLOPT_TIMEOUT, 360);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($data_string))
          );
          echo $res=curl_exec($ch);
          curl_close($ch);
          


  $i=$i+1;
}
     

  }

  function konfirmasi_wa(){
 
    $ID=$this->input->get('id');
    $kode_unik=$this->input->get('kode_unik');
    $groupid=$this->input->get('groupid');
    $urutan=$this->input->get('urutan');
    $draft=$this->input->get('draft');
    $id_kacab_regional=$this->input->get('id_kacab_regional');


    $data['urutan']=$urutan;
    $data['groupid']=$groupid;
    $data['kode_unik']=$kode_unik;
    $data['draft']=$draft;

    
        if($groupid=="15"){
         
         $line_manajer=$this->user_pengajuan_model->cek_line_manajer($ID);
            foreach($line_manajer as $row){
                  $id_line_manajer=$row->id_line_manajer;
                  $id_divisi      =$row->id_divisi;
                  $status_rule    =$row->status_rule;
                  $first_name     =$row->first_name;
                  $nama_divisi    =$row->nama_divisi;
           }
    
          if($id_kacab_regional==0){
               $id_atasan=$id_line_manajer;
          }else{
               $id_atasan=$id_kacab_regional;
          }

        }elseif($groupid="23"){

           $line_manajer=$this->user_pengajuan_model->cek_line_manajer($ID);
            foreach($line_manajer as $row){
                  $id_regional=$row->id_kacab_regional;
                  $first_name     =$row->first_name;
                  $nama_divisi    =$row->nama_divisi;
                 
           }
           $id_atasan=$id_regional;
        }

          $data['ID']=$ID;

          $data['id_line_manajer']=$id_atasan;
          $data['first_name'] = $first_name;
          $data['nama_divisi'] = $nama_divisi;
          $detail_manajer=$this->user_pengajuan_model->cek_line_manajer($id_atasan);
            foreach($detail_manajer as $row){
                $email          =$row->email;
            }


          $data['produk']=$this->user_pengajuan_model->tampil_produk_kepala_cabang($id_atasan,$kode_unik,$draft);
          

/*
        $group_manager         = array('manager');
        $group_kepala_regional = array('kepala regional');
        if ($this->ion_auth->in_group($group_manager)){ 
            $draft="4";
        }elseif ($this->ion_auth->in_group($group_kepala_regional)) {
            $draft="5";
        }
        $ID= $this->ion_auth->user()->row()->id;
        */
        $data['title']="Daftar Konfirmasi Produk";
        $data['daftar_permintaan_barang']=$this->toko_model->daftar_konfirmasi_produk_toko($id_line_manajer,$draft);
        

        $this->load->view('wa_konfirmasi_kacab',$data);
  }


  function konfirmasi_wa_regional(){
 
    $ID=$this->input->get('id');
    $kode_unik=$this->input->get('kode_unik');
    $groupid=$this->input->get('groupid');
    $urutan=$this->input->get('urutan');
    $draft=$this->input->get('draft');
    $id_kacab_regional=$this->input->get('id_kacab_regional');


    $data['urutan']=$urutan;
    $data['groupid']=$groupid;
    $data['kode_unik']=$kode_unik;
    $data['draft']=$draft;

    
        if($groupid=="15"){
         
         $line_manajer=$this->user_pengajuan_model->cek_line_manajer($ID);
            foreach($line_manajer as $row){
                  $id_line_manajer=$row->id_line_manajer;
                  $id_divisi      =$row->id_divisi;
                  $status_rule    =$row->status_rule;
                  $first_name     =$row->first_name;
                  $nama_divisi    =$row->nama_divisi;
           }
    
          if($id_kacab_regional==0){
               $id_atasan=$id_line_manajer;
          }else{
               $id_atasan=$id_kacab_regional;
          }

        }elseif($groupid="23"){

           $line_manajer=$this->user_pengajuan_model->cek_line_manajer($ID);
            foreach($line_manajer as $row){
                  $id_regional=$row->id_kacab_regional;
                  $first_name     =$row->first_name;
                  $nama_divisi    =$row->nama_divisi;
                 
           }
           $id_atasan=$id_regional;
        }

          $data['ID']=$ID;

          $data['id_line_manajer']=$id_atasan;
          $data['first_name'] = $first_name;
          $data['nama_divisi'] = $nama_divisi;
          $detail_manajer=$this->user_pengajuan_model->cek_line_manajer($id_atasan);
            foreach($detail_manajer as $row){
                $email          =$row->email;
            }
/*

          $data['produk']=$this->user_pengajuan_model->tampil_produk_kepala_cabang($id_atasan,$kode_unik,$draft);
          

/*
        $group_manager         = array('manager');
        $group_kepala_regional = array('kepala regional');
        if ($this->ion_auth->in_group($group_manager)){ 
            $draft="4";
        }elseif ($this->ion_auth->in_group($group_kepala_regional)) {
            $draft="5";
        }
        $ID= $this->ion_auth->user()->row()->id;
        */
        $data['title']="Daftar Konfirmasi Produk";
        $data['daftar_permintaan_barang']=$this->toko_model->daftar_konfirmasi_produk_toko($id_atasan,$draft);
        $this->load->view('wa_konfirmasi_kacab',$data);
  }




   function kirim_notifikasi_kacab($id_user,$id_detail){
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
      $ID=$de->id_user;
      $draft=$de->draft;
    }

    
    if($draft=="4"){
      $data['urutan']="2";
      $data['groupid']="15";
      $urutan="2";
      $groupid="15";

    }elseif($draft=="5"){
      $data['urutan']="3";
      $data['groupid']="23";
      $urutan="3";
      $groupid="23";
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
 


             $key='e48201034420a5726679dc3e5bb45e4d57c7d124e3ca68b6';
           $url='http://116.203.92.59/api/send_message';
         
          $on='uncg';
          $url_link='http://demo.aartijaya.com/Toko/konfirmasi_wa_regional?id='.$ID.'&kode_unik=&groupid='.$groupid.'&urutan='.$urutan.'&draft='.$draft.'&id_kacab_regional='.$id_kacab_regional;
          $data = array(
            "phone_no"=> '62895350164351',
            "key"   =>$key,
            "message" =>'Admin '.$nama_divisi.' meminta konfirmasi permintaan barang non dagang. Cek disini kacab regional '.$url_link
          );
          $data_string = json_encode($data);

          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_VERBOSE, 0);
          curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
          curl_setopt($ch, CURLOPT_TIMEOUT, 360);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($data_string))
          );
          echo $res=curl_exec($ch);
          curl_close($ch);
          


  }


  public function simpan_konfirmasi_toko_wa(){
    
    $id_kacab_regional = $this->ion_auth->user()->row()->id;
    $id_detail=$this->input->post('id_detail');
    $status   =$this->input->post('status');
    $draft    =$this->input->post('draft');
    $tanggal_konfirmasi = date('Y-m-d');
    $id_user    =$this->input->post('id_user');
/*
    echo $id_kacab_regional;
    echo "<br>";
    var_dump($id_detail);
    echo "<br>";
    var_dump($status);
    echo "<br>";
    var_dump($draft);
    echo "<br>";
    echo $tanggal_konfirmasi;
    echo "<br>";
    var_dump($id_user);
    echo "<br>";
    die;
    */




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
            $id_kategori=$ce->id_kategori_barang;
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
        /*
         $this->kirim_email_pic($id_pic,$email_pic,$id_user,$id_detail_barang,$firstname_pic,$lastname_pic);
         */

       }
    }
    $this->db->insert_batch('history_pengajuan', $insertArray);
    $this->db->update_batch('detail_pengajuan' , $updateArray , 'id_detail' );
    $this->cart->insert($datas);
  


    if($status_konfirmasi=="5"){
         $this->kirim_email_kacab($id_user,$id_detail);
         $this->kirim_notifikasi_kacab($id_user,$id_detail);
    }



           if($status_konfirmasi=="0"){
             
              $tampil_daftar_kategori=$this->toko_model->tampil_daftar_kategori('82');
              foreach($tampil_daftar_kategori as $ros){
                       $id_kategori_barangs[]=$ros->id_kategori_barang;
              
              }
              $TampungArray = array_diff($kategori,$id_kategori_barangs);


  
       $id_pengirim=$id_user;
       $code_otomatis=$this->user_pengajuan_model->cek_divisi_user($id_pengirim);
       $tanggal_pengajuan=date('Y-m-d');
       $tanggal_dibutuhkan=date('Y-m-d');
       $id_jenis_request="1";
       $id_gedung=$this->user_pengajuan_model->cek_id_gedung($id_pengirim);




      $this->user_pengajuan_model->insert_permintaan($code_otomatis,$tanggal_pengajuan,$tanggal_dibutuhkan,$id_jenis_request,$foto_name,$id_gedung,$keterangan,$id_pengirim,'0');

      $last_insert_id=$this->user_pengajuan_model->cek_id_pengajuan_terakhir();

           foreach($last_insert_id as $do){
             $id_terakhir = $do->id_pengajuan;
           }

      $insertPurchaseRequest = array();
      for($x = 0; $x < sizeof($id_detail); $x++){
        $id_detail_barang=$id_detail[$x];
        $cek_detail_barang    = $this->User_pengajuan_model->cek_detail_barang_user($id_detail_barang);

        foreach($cek_detail_barang as $ro){
           $kategori_id=$ro->id_kategori_barang;
        }

      if (in_array($kategori_id, $TampungArray)) {
   
       } else {
      $insertPurchaseRequest[] = array(
        'id_detail'        =>$id_detail[$x],
        'id_pengajuan'     =>$id_terakhir,
        'draft       '     =>'0',
        'groupid       '     =>'16'
      );
      $this->db->update_batch('detail_pengajuan' , $insertPurchaseRequest , 'id_detail' );
      
      }

       
      


     }

     if($id_terakhir){
        $id_groupss="16";
        $urutan_selanjutnya="6";
        $this->Pengajuan_model->insert_history_pengajuan_new($id_terakhir,'','',$urutan_selanjutnya,'',$id_groupss);
        $finance=$this->User_pengajuan_model->select_finance();
        foreach($finance as $row){
          $email_finance[]=$row->email;
        }



        $total_belanja=$this->User_pengajuan_model->tampil_detail_pengajuan($id_terakhir,'belum');
        foreach($total_belanja as $tot){
          $tharga_barang +=$tot->tharga;
        }
        $this->kirim_email_finance($email_finance,$id_terakhir,$tharga_barang,'','');
        /*
        $get_general_manager=$this->User_pengajuan_model->cek_general_manager('14');
            foreach($get_general_manager as $ge){
              $email_array[]=$ge->email;
            }
        $this->kirim_email_penerima($email_array,$id_terakhir,'0');
      */


/*
        $my_apikey = "5YFVQQ6IDRZJJH8TEJM3";
        $destination = "6282124393069";
$message = "Anda mempunyai persetujuan baru yang harus di setujui";
$api_url = "http://panel.rapiwha.com/send_message.php";
$api_url .= "?apikey=". urlencode ($my_apikey);
$api_url .= "&number=". urlencode ($destination);
$api_url .= "&text=". urlencode ($message);
$my_result_object = json_decode(file_get_contents($api_url, false));
echo "<br>Result: ". $my_result_object->success;
echo "<br>Description: ". $my_result_object->description;
echo "<br>Code: ". $my_result_object->result_code;
*/

/*
  http://localhost/sistem_berjenjang/Purchase_request/keputusan_telepon?id_po=%3C?php%20echo%20$id_permintaan.%27-%27.$groupid.%27-%27.$phone;%20?%3E

*/
 

/*
$basic  = new \Nexmo\Client\Credentials\Basic('0bf55cd1', 'NmzzjdxMokg4sF5s');
$client = new \Nexmo\Client($basic);

$message = $client->message()->send([
    'to' => '62895350164351',
    'from' => 'Nexmo',
    'text' => 'destinasiggg'
]);

*/
      }

    }
    redirect('Toko/daftar_konfirmasi_produk');

  }


   function kirim_notifikasi_user($id_user,$id_detail){
 
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
      $ID=$de->id_user;
      $draft=$de->draft;
    }

    
    if($draft=="4"){
      $data['urutan']="2";
      $data['groupid']="15";
      $urutan="2";
      $groupid="15";

    }elseif($draft=="5"){
      $data['urutan']="3";
      $data['groupid']="23";
      $urutan="3";
      $groupid="23";
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
 


             $key='e48201034420a5726679dc3e5bb45e4d57c7d124e3ca68b6';
           $url='http://116.203.92.59/api/send_message';
         
          $on='uncg';
          $url_link='http://demo.aartijaya.com/Toko/konfirmasi_wa_regional?id='.$ID.'&kode_unik=&groupid='.$groupid.'&urutan='.$urutan.'&draft='.$draft.'&id_kacab_regional='.$id_kacab_regional;
          $data = array(
            "phone_no"=> '62895350164351',
            "key"   =>$key,
            "message" =>'Pemberitahuan ESS - Produk anda telah disetujui Kepala Cabang. Silakan login untuk mengecek.'
          );
          $data_string = json_encode($data);

          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_VERBOSE, 0);
          curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
          curl_setopt($ch, CURLOPT_TIMEOUT, 360);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($data_string))
          );
          echo $res=curl_exec($ch);
          curl_close($ch);
          


  }




}
