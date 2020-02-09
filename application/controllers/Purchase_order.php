<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Purchase_order extends CI_Controller {

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
            $this->load->model('user_pengajuan_model');
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

	public function keputusan_wa()
	{
	    $purchase_order=$this->input->get('id_po');
         $var_purchase_order           =explode("-",$purchase_order);
         $id_po                        =$var_purchase_order[0];
         $groupid                      =$var_purchase_order[1];
         $no_wa                        =$var_purchase_order[2];

           $tampil_satu_history=$this->User_pengajuan_model->tampil_satu_history($id_po,$groupid);
    
     foreach($tampil_satu_history as $ro){
          $status=$ro->status;
          $id_user_approval=$ro->id_user_approval;
     }


        
if($status !=0 and $id_user_approval !=0){
            redirect('Login_User/gagal');

      }else{

        $data['id_po']=$id_po;
        $data['groupid']=$groupid;
        $data['no_wa']=$no_wa;
        $data['id_jenis_request']=1;
        $data['detail_po']=$this->User_pengajuan_model->select_purchase_order_byid_join($id_po);
        $detail_po=$this->User_pengajuan_model->select_purchase_order_byid_join($id_po);
         foreach($detail_po as $row){
            $data['no_permintaan']=$row->no_po;
         }
        $data['permintaan']=$this->User_pengajuan_model->get_detail_po($id_po);
        $data['history']=$this->User_pengajuan_model->cek_history_terakhir_po($id_po);
        $this->load->view('purchase_order/konfirmasi_wa',$data);
      }


	}


   public function simpan_keputusan_wa(){

    $id_po          = $this->input->get('id_po');
    $status_approval= $this->input->get('status_approval');
    $no_telepon     = $this->input->get('no_telepon');
    $grup_sekarang  = $this->input->get('groupid');
    $id_jenis_request  = $this->input->get('id_jenis_request');
    $tanggal=date('Y-m-d');

    $cek_user_konfirmasi=$this->User_pengajuan_model->cek_user_konfirmasi($no_telepon);
    

    foreach($cek_user_konfirmasi as $us){
        $id_user_konfirmasi=$us->id;
        $email_user_konfirmasi=$us->email;
    }

     $cekrule=$this->Pengajuan_model->cekrule($id_jenis_request,$grup_sekarang);
        foreach($cekrule as $cek){
             $urutan=$cek->urutan;
        }

       
      $cek_terakhir=$this->User_pengajuan_model->cek_history_terakhir_po($id_po);
        foreach($cek_terakhir as $c){
            $id_history=$c->id_history;
           
        }


     $tampil_satu_history=$this->User_pengajuan_model->tampil_satu_history($id_po,$grup_sekarang);
    
     foreach($tampil_satu_history as $ro){
          $status=$ro->status;
          $id_user_approval=$ro->id_user_approval;
     }

       if($status !=0 and $id_user_approval !=0){
            redirect('Login_User/gagal');

      }else{
        //penerima selanjutnya
        $next_urutan=$urutan+1;
        $nextpenerima=$this->Pengajuan_model->nextrule($id_jenis_request,$next_urutan);
        $jumlah_penerima=count($nextpenerima);
        $status=$status_approval;
       // grup penerima
       foreach($nextpenerima as $nextpe){
              $groupname=$nextpe->nama_group;
              $group_next=$nextpe->id_groups;
        }

         // jika grupname bukanmanager

        if($groupname !='manager'){

            $select_penerima_baru=$this->Pengajuan_model->select_penerima_baru($group_next);
            foreach($select_penerima_baru as $pem){
             $nex_penerima=$pem->id;
             $nex_email[]=$pem->email;
            }

          


        }else{
        // jika bukan
          $select_line_manajer=$this->Pengajuan_model->user_by_id($id_pengirim);
          foreach($select_line_manajer as $sel){
          $nex_penerima=$sel->id_line_manajer;
          $nex_email=$sel->email;
          }
        }

     $total_belanja_po=$this->User_pengajuan_model->cek_total_belanja_po($id_po);
      foreach($total_belanja_po as $ows){
        $total_belanja=$ows->total_bayar;
        $email_pengirim=$ows->email;
      }

        if($jumlah_penerima==0){
            $ket="Selesai";
        }


        $this->User_pengajuan_model->update_riwayat_persetujuan($status_approval,$id_history,$id_user_konfirmasi,$tanggal);
         if($jumlah_penerima > 0 and $status_approval==1){
             $this->User_pengajuan_model->insert_history_pengajuan_po($tanggal,$nex_penerima,$next_urutan,$group_next,$id_po,$ket);
              $this->kirim_email_purchase_order($nex_email,$nex_penerima, $id_po,$total_belanja);
         }elseif($jumlah_penerima==0 and $status_approval==1){
              $select_finance=$this->user_pengajuan_model->select_finance();
              foreach($select_finance as $row){
                $email_finance[]=$row->email;
              }
              $this->kirim_email_purchase_order_finance($email_finance,$id_po,$total_belanja);
         }

       
           $this->kirim_email_pembuat_po($email_pengirim,$id_po,$total_belanja);
          redirect('Login_User/berhasil');
        }
   }


    function kirim_email_purchase_order($email,$id_penerima,$last_insert_id,$total_belanja,$foto_name=""){
     

        $data['id_penerima']=$id_penerima;
        $data['id_purchase_order']=$last_insert_id;
        $data['pengajuan']=$this->user_pengajuan_model->select_purchase_order_byid_join($last_insert_id);
        $pengajuan=$this->user_pengajuan_model->select_purchase_order_byid($last_insert_id);
         foreach($pengajuan as $po){
          $nomor_pengajuan=$po->no_po;
         }
        $data['permintaan']=$this->user_pengajuan_model->get_detail_po($last_insert_id);
        $count_email=count($email);
        $tot=number_format($total_belanja);
        
       $i=0;
        while ($i <= $count_email)
        {
          $email_asli=$email[$i];
          $data['email_asli']=$email_asli;
          $message = $this->load->view('email_baru/konfirmasi_po',$data, TRUE);
          $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
          $this->email->to($email_asli);
          $this->email->subject('Konfirmasi Persetujuan Purchase Order - Baru (#'.$nomor_pengajuan.') - (Rp'.$tot.')');
          $this->email->message($message);
          if($foto_name){
            $this->email->attach('http://portal.aartijaya.com/files/pengajuan/'.$foto_name);
          }
        $this->email->send();
        $i=$i+1;
        }
    }
  
 function kirim_email_purchase_order_finance($email,$last_insert_id,$total_belanja,$foto_name=""){
    


        $data['id_penerima']=$id_penerima;
        $data['id_purchase_order']=$last_insert_id;
        $data['pengajuan']=$this->user_pengajuan_model->select_purchase_order_byid_join($last_insert_id);
        $pengajuan=$this->user_pengajuan_model->select_purchase_order_byid($last_insert_id);
         foreach($pengajuan as $po){
          $nomor_pengajuan=$po->no_po;
         }
        $data['permintaan']=$this->user_pengajuan_model->get_detail_po($last_insert_id);
        $count_email=count($email);
        $tot=number_format($total_belanja);
        
       $i=0;
        while ($i <= $count_email)
        {
          $email_asli=$email[$i];
          $data['email_asli']=$email_asli;
          $message = $this->load->view('email_baru/konfirmasi_po_finance',$data, TRUE);
          $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
          $this->email->to($email_asli);
          $this->email->subject('Konfirmasi Persetujuan Purchase Order - Baru (#'.$nomor_pengajuan.') - (Rp'.$tot.')');
          $this->email->message($message);
          if($foto_name){
            $this->email->attach('http://portal.aartijaya.com/files/pengajuan/'.$foto_name);
          }
        $this->email->send();
        $i=$i+1;
        }
    }
  
   function kirim_email_pembuat_po($email,$id_pengajuan,$total_belanja){
          
        $data['id_purchase_order']=$id_pengajuan;
        $data['pengajuan']=$this->user_pengajuan_model->select_purchase_order_byid_join($id_pengajuan);
        $pengajuan=$this->user_pengajuan_model->select_purchase_order_byid($id_pengajuan);
        foreach($pengajuan as $po){
          $nomor_pengajuan=$po->no_po;
        }
        $data['permintaan']=$this->user_pengajuan_model->get_detail_po($id_pengajuan);
        $count_email=count($email);
        $tot=number_format($total_belanja);
      
          $message = $this->load->view('email_baru/konfirmasi_po_pembuat',$data, TRUE);
          $this->email->from('no-reply@bursasajadah.com', 'Bursa Sajadah');
          $this->email->to($email);
          $this->email->subject('Status Konfirmasi Persetujuan Purchase Order - Baru (#'.$nomor_pengajuan.') - (Rp'.$tot.')');
          $this->email->message($message);
          if($foto_name){
            $this->email->attach('http://portal.aartijaya.com/files/pengajuan/'.$foto_name);
          }
        $this->email->send();
        
    }


}
