<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_User extends CI_Controller {

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
		$this->load->database();
		$this->load->model('Login_model');
			$this->load->model('Pengajuan_model');
            $this->load->model('User_pengajuan_model');
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->helper(array('url', 'language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');

        $this->load->helper('tgl_indo');
        $this->load->model('Pengajuan_model');
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
		$this->load->view('login_user_vw2');
	}


	public function lupa_password()
	{
		 $this->load->view('layouts/header');
		 $this->load->view('lupa_password');
		 $this->load->view('layouts/footer');


	}


	public function _render_page($view, $data = NULL, $returnhtml = FALSE)//I think this makes more sense
	{
		$this->viewdata = (empty($data)) ? $this->data : $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		// This will return html on 3rd argument being true
		if ($returnhtml)
		{
			return $view_html;
		}
	}

	public function aksi_input_email()
	{
	$email = $this->input->post('email');


    $cek_email= $this->Login_model->cek_email_terdaftar($email);
    $count_email=count($cek_email);

    

    if($count_email==0){

     echo $this->session->set_flashdata('message', '<div class="alert alert-info"><b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Email tidak terdaftar 
            </b></div>');
     
    }else{
             $clean = $this->security->xss_clean($email);  
             $userInfo = $this->Login_model->getUserInfoByEmail($clean);  
             $token = $this->Login_model->insertToken($userInfo->id);              
             $qstring = $this->base64url_encode($token);  
           

             $this->kirim_email_reset($email,$qstring);        
        echo $this->session->set_flashdata('message', '<div class="alert alert-info"><b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Silakan buka email anda, kami telah mengirim link reset password
            </b></div>');

    }
    redirect('Login_User/lupa_password');

	}


	function kirim_email_reset($email,$random){

     $this->load->library('email');
     $data['email']=$email;
     $data['qstring']=$random;
     $userInfo = $this->Login_model->getUserInfoByEmail($email);
     $data['id']=$userInfo->id;
     $message = $this->load->view('email_baru/email_reset',$data, TRUE);
     $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
     $this->email->to($email); 
     $this->email->subject('Reset Password Baru');
     $this->email->message($message);
     $this->email->send();
     

  }


  public function reset_password($qstring,$id)  
     {  
       $token = $this->base64url_decode($qstring); 
       $data['token_id']= $tkn = substr($token,0,30); 
       $cleanToken = $this->security->xss_clean($token);  
       $data['id_user']=$id;
       $user_info = $this->Login_model->isTokenValid($cleanToken); 
        if(!$user_info){  
          echo $this->session->set_flashdata('message', '<div class="alert alert-info"><b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Link telah kadauarsa
            </b></div>');
         redirect(site_url('Login_User'),'refresh');   
       }else{

          $this->load->view('reset_password',$data);

       }         
        
     }  


/*

	function create_random($length)
    {
    $data = 'ABCDEFGHIJKLMNOPQRSTU1234567890';
    $string = '';
    for($i = 0; $i < $length; $i++) {
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }
    return $string;
    }

*/

    public function aksi_reset_password()
	{
		$id = $this->input->post('id');
		$passganti = $this->input->post('password');
		$token_id = $this->input->post('token_id');
		if(empty($passganti))
		{
			$pass = "";
		}else{
			$pass = $passganti;
		}

		$data = array(
					'password' => $pass,
					 );

		$this->ion_auth->update($id, $data);
        $this->Login_model->update_status_token($token_id);
		echo $this->session->set_flashdata('message', '<div class="alert alert-info"><b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Password berhasil direset silkan login!
            </b></div>');
		redirect ('Login_User','refresh');
	}

    public function base64url_encode($data) {   
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');   
    }   
    public function base64url_decode($data) {   
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));   
    }    



    public function simpan_keputusan_email(){

        $status_approval      = $this->input->get('status_approval');
        $email                = $this->input->get('email');
        $id_approv=$this->User_pengajuan_model->cek_users_id($email);
        $cek_users_group_email = $this->User_pengajuan_model->cek_group_users($email);

          foreach($cek_users_group_email as $row){
               $group_approv=$row->group_id;
          }
        $id_pengajuan         = $this->input->get('id_pengajuan');
        $id_pengirim          = $this->input->get('id_pengirim');

        $email_pengirim_pr=$this->user_pengajuan_model->get_users_id($id_pengirim);
        foreach($email_pengirim_pr as $pr){
            $email_pengirim=$pr->email;
            $phone_pengirim=$pr->phone;
        }
        $lampiran             = $this->input->get('lampiran');
        $id_jenis_request     = $this->input->get('id_jenis_request');
        $urutan               = $this->input->get('urutan');
        $grup_sekarang        = $this->input->get('grup_sekarang');
        $nama_divisi          = $this->input->get('nama_divisi');
       

        $catatan             = $this->input->get('catatan');
    
        $data['id_pengajuan']=$id_pengajuan;
        $data['email']=$email;
        $data['status_approval']=$status_approval;
        $data['id_pengirim']=$id_pengirim;
        $data['id_jenis_request']=$id_jenis_request;
        $data['urutan']=$next_urutan;
        $data['lampiran']=$lampiran;
        $data['catatan']=$catatan;
        // mengecek apakah persetujuan ini sudah ada yang approv atau belum //
        

        /*
        $history=$this->Pengajuan_model->select_history($id_pengajuan,$urutan);
        foreach($history as $hs){
            $user_approv=$hs->id_user_approval;
        }
        

        $cek_id_groups=$this->Pengajuan_model->nextrule($id_jenis_request,$next_urutan);
        foreach($cek_id_groups as $gr){

            $id_groups=$gr->id_groups;
            $name_groups=$gr->nama_group;
        }

       

        $cek_user_email=$this->Pengajuan_model->cek_user_email($email);
        foreach($cek_user_email as $ce){
           $approve=$ce->id;
         }

        $email_peng=$this->Pengajuan_model->select_email_pengirim($id_pengirim);
        foreach($email_peng as $peng){
            $email_pengirim=$peng->email;
        }
       
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

        $select_history=$this->Pengajuan_model->select_history($id_pengajuan,$urutan);
        foreach($select_history as $sele){

            $approv=$sele->id_user_approval;
        }

        */

       $tampil_satu_history=$this->User_pengajuan_model->tampil_satu_history_pr($id_pengajuan,$group_approv);
    
       foreach($tampil_satu_history as $ro){
          $status=$ro->status;
          $id_user_approval=$ro->id_user_approval;
       }


        if($status !=0 and $id_user_approval==$id_approv){
            redirect('Login_User/gagal');
        }else{
         $tanggal_persetujuan=date('Y-m-d');
         $riwayat_terakhir=$this->user_pengajuan_model->cek_history_terakhir_pr($id_pengajuan);
         
         foreach($riwayat_terakhir as $riw){
            $urutan=$riw->urutan;
         }

       

           $urutan_selanjutnya=$urutan;

       

        /*
       // yg acc selanjutnya
       $next_urutan=$urutan_selanjutnya+1;

       $nextrule=$this->Pengajuan_model->nextrule($id_jenis_request,$next_urutan);
       foreach($nextrule as $next){
              $namagroup=$next->nama_group;
              $id_groups=$next->id_groups;
        }
            
        */
        // penerima selanjutnya
       
        $next_penerima=$urutan_selanjutnya+1;
        $nextpenerima=$this->Pengajuan_model->nextrule($id_jenis_request,$next_penerima);
       


        $jumlah_penerima=count($nextpenerima);
        $status=$status_approval;
       // grup penerima
       foreach($nextpenerima as $nextpe){
              $groupname=$nextpe->nama_group;
              $groupid=$nextpe->id_groups;
        }

        // jika grupname bukanmanager

        if($groupname !='manager'){

            $select_penerima_baru=$this->Pengajuan_model->select_penerima_baru($groupid);
            foreach($select_penerima_baru as $pem){
             $nex_penerima=$pem->id;
             $nex_email[]=$pem->email;
            }

        }else{
        // jika iya
          $select_line_manajer=$this->Pengajuan_model->user_by_id($id_pengirim);
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
        $this->Pengajuan_model->update_pengajuan_new($next_penerima,$id_pengajuan,$status_approval,$id_approv);
        $this->Pengajuan_model->update_history_pengajuan_new($status_approval,$id_history,$tanggal_persetujuan,$id_approv,$ket,'','',$catatan);
        // menghitung total belanja
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

        


        
        // -----================================================//

       if($jumlah_penerima==0){

         $ket="Selesai";
         $finance=$this->User_pengajuan_model->select_finance();
                foreach($finance as $fin){
                    $email_financen[]=$fin->email;
                }
                 $this->kirim_email_finance($email_financen, $id_pengajuan,$total_belanja,$foto_name);
        }elseif($jumlah_penerima > 0 and $status_approval==1){

            $this->Pengajuan_model->insert_history_pengajuan_new($id_pengajuan,'',$nex_penerima,$next_penerima,'0',$groupid,'');
                       
            if($groupname=="Purchasing" or $groupname=="purchasing"){
                $finance=$this->User_pengajuan_model->select_finance();
                foreach($finance as $fin){
                    $email_financen[]=$fin->email;
                }
                 $this->kirim_email_finance($email_financen, $id_pengajuan,$total_belanja,$foto_name);
                 $this->kirim_email($nex_email,$id_pengajuan,$total_belanja);


            }else{
                 $this->kirim_email_penerima($nex_email, $id_pengajuan,$total_belanja);
                 $this->kirim_wa_user($nex_email,$nex_penerima,$id_pengajuan,$total_belanja);
                 /*
                  $this->kirim_wa_user($nex_email,$nex_penerima,$id_pengajuan,$total_belanja);
                  */
            }

             redirect('Login_User/berhasil');
        }

        
        $this->kirim_email_pembuat($email_pengirim, $id_pengajuan,$total_belanja);
        $this->kirim_wa_pembuat($email_pengirim, $id_pengajuan,$total_belanja);
       
         
     }      


         

      function upload_file(){

        $id_pengajuan=$this->input->post('id_pengajuan');
        $id_history=$this->input->post('id_history');
        $email=$this->input->post('email');
        $status_approval=$this->input->post('status_approval');
        $id_pengirim=$this->input->post('id_pengirim');
        $id_jenis_request=$this->input->post('id_jenis_request');
        $urutan=$this->input->post('urutan');


        $foto = $_FILES['foto']['name'];

        $foto_name = str_replace(" ", "_", $foto);

        $config['upload_path'] = './files/pengajuan/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xls|xlsx|csv';
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
$email_peng=$this->Pengajuan_model->select_email_pengirim($id_pengirim);
        foreach($email_peng as $peng){
            $email_pengirim=$peng->email;
        }
       
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



       


            /*
        $select_penerima_baru=$this->Pengajuan_model->select_penerima_baru($groupid);
         foreach($select_penerima_baru as $pem){
            $nex_penerima=$pem->id;
            $nex_email=$pem->email;
         }

*/
 if($groupname !='manager'){

        $select_penerima_baru=$this->Pengajuan_model->select_penerima_baru($groupid);
         foreach($select_penerima_baru as $pem){
            $nex_penerima=$pem->id;
            $nex_email[]=$pem->email;
         }
        }else{

       $select_line_manajer=$this->Pengajuan_model->user_by_id($id_pengirim);
       foreach($select_line_manajer as $sel){
            $nex_penerima=$sel->id_line_manajer;
           

       }
         $user_by_id=$this->Pengajuan_model->user_by_id($nex_penerima);
         foreach($user_by_id as $us){
            $nex_email[]=$us->email;
         }


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

        $this->Pengajuan_model->update_history_pengajuan_new($status_approval,$id_history,$tanggal_persetujuan,$approve_by,$ket,$foto_name,$groupid);

        if($jumlah_penerima > 0 and $status_approval==1){
         $this->Pengajuan_model->insert_history_pengajuan_new($id_pengajuan,'',$nex_penerima,$next_urutan,'0',$groupid);
         


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


    
       if($jumlah_penerima > 0 and $status_approval==1){
        $this->kirim_email_penerima($nex_email, $id_pengajuan,$total_belanja,$foto_name,$lampiran);
        }
         
         if(($groupname=='Finance') or ($groupname=='finance') or($approve_by=="34")){
            $this->kirim_email_finance('ranipandawarman@gmail.com', $id_pengajuan,$total_belanja,$foto_name);
            
        }
        $this->kirim_email_pembuat($email_pengirim, $id_pengajuan,$total_belanja,$foto_name);
        redirect('Login_User/berhasil');
        }

     }





      function gagal(){

        $this->load->view('gagal');
     }



     
    function kirim_email_penerima($email,$last_insert_id,$total_belanja,$foto_name="",$lampiran=""){
       


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
               $data['metode_pembayaran']=$per->metode_pembayaran;
            $data['ppn']=$per->ppn;
            $data['nama_gedung']=$per->nama_gedung;
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
            $data['nama_gedung']=$per->nama_gedung;
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


    ///////////////////////////////////////////////===//////////////////////////////////

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
  $message = $this->load->view('email_baru/konfirmasi_finance',$data, TRUE);
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


       function berhasil(){

        $this->load->view('behasil');
     }

 function kirim_wa_user($email,$id_penerima,$last_insert_id,$total_belanja,$foto_name=""){
      

      

        $count_email=count($email);
        $id_peng=$last_insert_id;
        $tot=number_format($total_belanja);
        $ID = $this->ion_auth->user()->row()->id;
        $data['permintaan']=$this->Pengajuan_model->detail_barang_per_id($last_insert_id);
        $pengajuan=$this->user_pengajuan_model->tampil_pengajuan($last_insert_id);
         foreach($pengajuan as $col){
          $foto_name=$col->lampiran;
          $nomor_pengajuan=$col->no_pengajuan;
          $tgl_pengajuan=$col->tanggal_pengajuan;
        }

     
      $data['vendor']=$this->Pengajuan_model->select_vendor($id_peng);
      $permintaan_ajuan=$this->Pengajuan_model->select_pengajuan_detail($id_peng);
      $history=$this->user_pengajuan_model->cek_history_terakhir_pr($last_insert_id);
      foreach($history as $fo){
        $data['groupid']=$fo->groupid;
        $data['status_history']=$fo->status;

        $groupid=$fo->groupid;
      }
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
            $data['id_pengirim']=$per->id_user;
            $data['id_divisi']=$per->id_divisi;
            $data['tipe_pajak']=$per->tipe_pajak;
            $data['nama_gedung']=$per->nama_gedung;
            $nomor_pengajuan=$per->no_pengajuan;
            $tgl_pengajuan=$per->tanggal_pengajuan;
            $id_pengajuan=$per->id_pengajuan;
            $lampiran_aja=$per->lampiran;
            $first_name=$per->first_name;
            $last_name=$per->last_name;
      }

       $data['pengajuan']=$this->Pengajuan_model->select_pengajuan_by_no($id_peng);
       $data['history']=$this->Pengajuan_model->history_pengajuan($id_peng);

           $key='e48201034420a5726679dc3e5bb45e4d57c7d124e3ca68b6';
           $url='http://116.203.92.59/api/send_message';
       $i=0;
        while ($i <= $count_email)
        {
 
          $email_asli=$email[$i];

          $cek_telepon_email=$this->User_pengajuan_model->cek_no_telepon($email_asli);
          $on='uncg';

          /*

          Purchase_request/keputusan_telepon?id_po=<?php echo $id_permintaan.'-'.$groupid.'-'.$phone;
          */
          $base_url=base_url();

          $url_link=base_url().'Purchase_request/keputusan_telepon?id_po='.$id_pengajuan.'-'.$groupid.'-'.$cek_telepon_email;
          $data = array(
            "phone_no"=> $cek_telepon_email,
            "key"   =>$key,
            "message" =>''.$first_name.' '.$last_name.' meminta konfirmasi permintaan barang non dagang dengan nomor'.$nomor_pengajuan.' Cek disini '.$url_link
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



    function kirim_wa_pembuat($email,$last_insert_id,$total_belanja,$foto_name=""){
      

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
            $data['nama_gedung']=$per->nama_gedung;
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


       
      
         

          $cek_telepon_email=$this->User_pengajuan_model->cek_no_telepon($email);
          $on='uncg';

          /*

          Purchase_request/keputusan_telepon?id_po=<?php echo $id_permintaan.'-'.$groupid.'-'.$phone;
          */
          $base_url=base_url();

          $url_link=base_url().'Purchase_request/keputusan_telepon?id_po='.$id_pengajuan.'-'.$groupid.'-'.$cek_telepon_email;
          $data = array(
            "phone_no"=> $cek_telepon_email,
            "key"   =>$key,
            "message" =>$first_name.' '.$last_name.' permintaan barang non dagang anda dengan nomor '.$nomor_pengajuan.' telah di konfirmasi oleh manager'
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
